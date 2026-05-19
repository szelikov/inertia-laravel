FROM node:24.15.0-alpine

ARG UID=1000
ARG GID=1000

RUN sed -i "s/^node:x:1000:1000:/node:x:$UID:$GID:/" /etc/passwd &&\
    sed -i "s/^node:x:1000:/node:x:$GID:/" /etc/group

ENV PNPM_HOME=/pnpm
ENV PATH="$PNPM_HOME:$PATH"
ENV XDG_CACHE_HOME=/tmp/corepack-cache
RUN mkdir -p $PNPM_HOME && chmod 777 $PNPM_HOME && \
    mkdir -p $XDG_CACHE_HOME && chmod -R 777 $XDG_CACHE_HOME
RUN corepack enable pnpm
RUN corepack prepare pnpm@11.1.2 --activate

USER node
    
ARG WORKDIR=/app
WORKDIR ${WORKDIR}

RUN corepack prepare pnpm@11.1.2 --activate

EXPOSE 80

CMD [ "pnpm", "-v" ]
