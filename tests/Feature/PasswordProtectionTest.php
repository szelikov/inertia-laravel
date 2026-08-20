<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Page;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasswordProtectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_to_password_form_for_protected_page()
    {
        $page = Page::factory()->create([
            'password' => 'secret',
        ]);

        $this->get("/{$page->slug}")
            ->assertRedirect("/protected/Page/{$page->slug}/password");
    }

    /** @test */
    // public function it_redirects_to_password_form_for_protected_article()
    // {
    //     $article = Article::factory()->create([
    //         'password' => 'secret',
    //     ]);

    //     $this->get("/articles/{$article->slug}")
    //         ->assertRedirect("/protected/Article/{$article->slug}/password");
    // }

    /** @test */
    public function it_allows_access_after_correct_password()
    {
        $page = Page::factory()->create([
            'password' => 'secret',
        ]);

        $this->post("/protected/Page/{$page->slug}/password", [
            'password' => 'secret',
        ])->assertRedirect("/{$page->slug}");

        $this->withSession(["password_access.{$page->id}" => true])
            ->get("/{$page->slug}")
            ->assertOk();
    }

    /** @test */
    public function it_rejects_wrong_password()
    {
        $page = Page::factory()->create([
            'password' => 'secret',
        ]);

        $this->post("/protected/Page/{$page->slug}/password", [
            'password' => 'wrong',
        ])
        ->assertSessionHasErrors('password');
    }
}
