# Build stage
FROM golang:1.24-alpine AS builder
WORKDIR /app
COPY . .

# 关闭 CGO 以获得更小的可执行文件
ENV CGO_ENABLED=0

# 下载依赖并编译
RUN go mod download \
    && go build -v -o XrayR -trimpath -ldflags "-s -w -buildid="

# ----------------------------------------------------------------------
# Release stage
FROM alpine:latest AS release

# 安装时区与根证书
RUN apk --update --no-cache add tzdata ca-certificates \
    && cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime

# 准备运行目录
RUN mkdir -p /etc/XrayR/

# 拷贝可执行文件
COPY --from=builder /app/XrayR /usr/local/bin/XrayR

# 启动命令
ENTRYPOINT ["XrayR", "--config", "/etc/XrayR/config.yml"] 