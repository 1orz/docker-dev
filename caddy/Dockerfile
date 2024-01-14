FROM caddy:builder-alpine AS builder
RUN xcaddy build \
    --with github.com/caddy-dns/dnspod \
    --with github.com/caddy-dns/alidns \
    --with github.com/caddy-dns/cloudflare \
    --with github.com/caddy-dns/godaddy \
    --with github.com/caddy-dns/gandi

FROM caddy:alpine

COPY --from=builder /usr/bin/caddy /usr/bin/caddy