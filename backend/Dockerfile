# Stage 1: Build the application
FROM maven:3.8.5-openjdk-11 AS build
WORKDIR /app
COPY pom.xml .
RUN mvn dependency:go-offline
COPY src ./src
RUN mvn package -DskipTests

# Stage 2: Create the final image
FROM openjdk:11-jre-slim
WORKDIR /app
COPY --from=build /app/target/realestate-0.0.1-SNAPSHOT.jar .
EXPOSE 8080
ENTRYPOINT ["java", "-jar", "realestate-0.0.1-SNAPSHOT.jar"]
