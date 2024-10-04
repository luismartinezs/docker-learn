# build a binary with bun
FROM oven/bun AS build

WORKDIR /app

COPY bun.lockb .
COPY package.json .

RUN bun install --frozen-lockfile

COPY src ./src

# compile everything to a binary called cli which includes the bun runtime
RUN bun build ./src/index.ts --compile --outfile cli

# use a smaller image without bun to minimize build size
FROM ubuntu:22.04

WORKDIR /app

COPY --from=build /app/cli /app/cli

EXPOSE 3001
CMD ["/app/cli"]
