FROM oven/bun:latest

WORKDIR /app

# Copy the rest of the application code
COPY package.json bun.lockb .

# Install dependencies
RUN bun install --frozen-lockfile

COPY . .

# Build the application
# RUN bun run build

ENV PORT=8080

EXPOSE 8080

CMD ["bun", "run", "dev"]