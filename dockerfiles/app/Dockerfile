FROM ubuntu:22.04

LABEL maintainer="Taylor Otwell"

ARG WWWGROUP

WORKDIR /var/www

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN echo 'alias migrate="php artisan migrate"' >> ~/.bashrc
RUN echo 'alias rollback="php artisan migrate:rollback"' >> ~/.bashrc
RUN echo 'alias seed="php artisan db:seed"' >> ~/.bashrc
RUN echo 'alias seedgod="php artisan db:seed --class=GodSeeder"' >> ~/.bashrc
RUN echo 'alias cda="composer dump-autoload"' >> ~/.bashrc

RUN apt-get update \
    && apt-get install -y gnupg gosu curl ca-certificates zip unzip supervisor libcap2-bin libpng-dev python2 \
    && mkdir -p ~/.gnupg \
    && chmod 600 ~/.gnupg \
    && echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf \
    && echo "keyserver hkp://keyserver.ubuntu.com:80" >> ~/.gnupg/dirmngr.conf \
    && gpg --recv-key 0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c \
    && gpg --export 0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c > /usr/share/keyrings/ppa_ondrej_php.gpg \
    && echo "deb [signed-by=/usr/share/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu jammy main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.2-cli php8.2-dev \
    php8.2-gd \
    php8.2-curl php8.2-memcached \
    php8.2-imap php8.2-mysql php8.2-mbstring \
    php8.2-xml php8.2-zip php8.2-bcmath php8.2-soap \
    php8.2-intl php8.2-readline \
    php8.2-msgpack php8.2-igbinary php8.2-ldap \
    php8.2-redis \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && apt-get update \
    && apt-get install -y mysql-client \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN pecl channel-update https://pecl.php.net/channel.xml \
    && pecl install swoole \
    && pecl clear-cache \
    && rm -rf /tmp/* /var/tmp/*

RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.2

COPY dockerfiles/app/start-container /usr/local/bin/start-container
COPY dockerfiles/app/scheduler.sh /usr/local/bin/scheduler.sh
COPY dockerfiles/app/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY dockerfiles/app/php.ini /etc/php/8.2/cli/conf.d/99-sail.ini

RUN chmod +x /usr/local/bin/start-container
RUN chmod +x /usr/local/bin/scheduler.sh

ENTRYPOINT ["start-container"]
