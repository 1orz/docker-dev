FROM cloudorz/caddy:builder-beta AS builder
RUN xcaddy build \
    --with github.com/caddy-dns/dnspod \
    --with github.com/caddy-dns/alidns \
    --with github.com/caddy-dns/cloudflare \
    --with github.com/caddy-dns/godaddy

FROM cloudorz/caddy:alpine-beta

COPY --from=builder /usr/bin/caddy /usr/bin/caddy