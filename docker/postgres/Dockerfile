FROM postgres:15.4

WORKDIR /app

RUN apt-get update && apt-get install -y \
    openssl \
    git \
    zip \
    wget \
    curl \
    iputils-ping \
    vim \
    bash-completion \
    nano \
    htop \
    && rm -r /var/lib/apt/lists/*

EXPOSE 5432
