<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Enums\ProtectedType;
use Illuminate\Database\Eloquent\Model;

final class PasswordController extends Controller
{
    public function show(string $type, string $slug)
    {
        $item = $this->resolveModel($type, $slug);

        if (empty($item->password)) {
            return redirect($item->presenter()->contentUrl());
        }

        return Inertia::render('PasswordProtected', [
            'title' => $item->title ?? $item->name,
        ]);
    }

    public function check(Request $request, string $type, string $slug)
    {
        $item = $this->resolveModel($type, $slug);

        $request->validate([
            'password' => 'required|string',
        ]);

        if ($item->password !== $request->password) {
            return back()->withErrors(['password' => 'Password Mismatch']);
        }

        $request->session()->put("password_access.{$item->id}", true);

        $url = $item->presenter()->contentUrl();

        return redirect()->to($url);
    }

    private function resolveModel(string $type, string $slug): Model
    {
        $enum = ProtectedType::from($type);

        $model = $enum->modelClass();

        return $model::where('slug', $slug)->firstOrFail();
    }
}
