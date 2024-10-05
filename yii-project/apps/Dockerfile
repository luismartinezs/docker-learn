FROM oven/bun:latest
WORKDIR /app
COPY package.json bun.lockb .
# if deps are shared I dont need to install them in dev. But I think it's better to do it because this way otehr devs don't need to run bun install (if they change deps they will just need to rebuild the container)
RUN bun install --frozen-lockfile
# no need to copy anything as all files are shared with host
COPY . .
EXPOSE 3000
CMD ["bun", "run", "dev"]