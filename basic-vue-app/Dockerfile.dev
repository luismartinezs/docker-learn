FROM oven/bun:latest

WORKDIR /app

# Copy the rest of the application code
COPY package.json bun.lockb .

# Install dependencies
RUN bun install --frozen-lockfile

COPY . .

EXPOSE 5173

CMD ["bun", "run", "dev"]