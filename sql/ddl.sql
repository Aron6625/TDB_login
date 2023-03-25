CREATE TABLE "user"(
  "id" SERIAL PRIMARY KEY,
  "name" VARCHAR(255) NOT NULL,
  "email" VARCHAR(255) NOT NULL UNIQUE,
  "password" VARCHAR(512) NOT NULL
);

CREATE TABLE "session"(
  "id" SERIAL PRIMARY KEY,
  "process_id" INT NOT NULL,
  "ip_address" VARCHAR(15) NOT NULL,
  "user_id" INT NOT NULL,

  FOREIGN KEY ("user_id") REFERENCES "user"("id")
);
