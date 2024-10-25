FROM debian:12.7

ENV RUNNING_IN_DOCKER true

RUN apt -y update && apt -y upgrade
RUN apt install -y nginx
RUN apt install -y git
RUN apt install -y curl
RUN apt install -y wget
RUN apt install -y vim
RUN apt install -y zip
RUN apt install -y iputils-ping

COPY ./nginx.conf /etc/nginx/conf.d/nginx.conf
COPY ./self-signed.conf /etc/nginx/ssl/self-signed.conf
COPY ./ssl-params.conf /etc/nginx/ssl/ssl-params.conf

COPY ./ca.crt /etc/nginx/ssl/ca.crt
COPY ./ca.key /etc/nginx/ssl/ca.key

# Oh-My-Zsh install
RUN sh -c "$(wget -O- https://github.com/deluan/zsh-in-docker/releases/download/v1.2.0/zsh-in-docker.sh)"

WORKDIR /var/www/full-symfony-template

CMD ["/usr/sbin/nginx", "-g", "daemon off;"]

EXPOSE 80 443

#ENTRYPOINT ["tail", "-f", "/dev/null"]

ENTRYPOINT nginx -g 'daemon off;'

