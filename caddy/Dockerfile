FROM caddy:builder AS builder
RUN xcaddy build \
    --with github.com/caddy-dns/alidns \
    --with github.com/caddy-dns/tencentcloud \
    --with github.com/caddy-dns/cloudflare

FROM caddy:latest

COPY --from=builder /usr/bin/caddy /usr/bin/caddy
