FROM golang:alpine AS builder
# 从xcaddy 最新master分支构建xcaddy
RUN go install github.com/caddyserver/xcaddy/cmd/xcaddy@master

WORKDIR /workspace
RUN xcaddy build \
    --with github.com/caddy-dns/alidns \
    --with github.com/caddy-dns/tencentcloud \
    --with github.com/caddy-dns/cloudflare

FROM debian:latest

COPY --from=builder /workspace/caddy /usr/bin/caddy

ENV XDG_CONFIG_HOME=/config
ENV XDG_DATA_HOME=/data

EXPOSE 80
EXPOSE 443
EXPOSE 443/udp
EXPOSE 2019

WORKDIR /srv

CMD ["caddy", "run", "--config", "/etc/caddy/Caddyfile", "--adapter", "caddyfile"]
