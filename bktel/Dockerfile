FROM ubuntu:18.04
ENV DEBIAN_FRONTEND noninteractive

ARG PHP_VERSION=7.4

ENV PHP_VERSION ${PHP_VERSION}

ARG DEBIAN_FRONTEND=noninteractive
RUN echo "deb http://archive.ubuntu.com/ubuntu/ bionic-proposed main" >> /etc/apt/sources.list

RUN apt-get update && \
    apt-get -y upgrade && \
    apt-get -y install sudo && \
    apt-get install -y software-properties-common && \
    apt-get install -y poppler-utils && \
    apt-get install -y apt-utils && \
    LC_ALL=C.UTF-8 add-apt-repository -y -u ppa:ondrej/php && \
    apt-get install -y \
    php${PHP_VERSION} \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-mysql \
    php${PHP_VERSION}-soap \
    mcrypt \
    php${PHP_VERSION}-gd \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-gmp \
    curl \
    zip \
    php${PHP_VERSION}-zip \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-redis \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-opcache \
    php${PHP_VERSION}-bcmath \
    php${PHP_VERSION}-imagick \
    openssl \
    nginx \
    vim \
    ghostscript \
    build-essential \
    libmagickwand-dev \
    imagemagick \
    libnss3 gconf-service libasound2 libatk1.0-0 libc6 libcairo2 libcups2 libdbus-1-3 libexpat1 libfontconfig1 libgcc1 libgconf-2-4 libgdk-pixbuf2.0-0 libglib2.0-0 libgtk-3-0 libnspr4 libpango-1.0-0 libpangocairo-1.0-0 libstdc++6 libx11-6 libx11-xcb1 libxcb1 libxcomposite1 libxcursor1 libxdamage1 libxext6 libxfixes3 libxi6 libxrandr2 libxrender1 libxss1 libxtst6 ca-certificates fonts-liberation libappindicator1 lsb-release xdg-utils wget libgbm-dev \
    supervisor && \
    rm -fr /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_14.x | sudo -E bash -
RUN sudo apt-get install -y nodejs gconf-service libasound2 libatk1.0-0 libc6 libcairo2 libcups2 libdbus-1-3 libexpat1 libfontconfig1 libgbm1 libgcc1 libgconf-2-4 libgdk-pixbuf2.0-0 libglib2.0-0 libgtk-3-0 libnspr4 libpango-1.0-0 libpangocairo-1.0-0 libstdc++6 libx11-6 libx11-xcb1 libxcb1 libxcomposite1 libxcursor1 libxdamage1 libxext6 libxfixes3 libxi6 libxrandr2 libxrender1 libxss1 libxtst6 ca-certificates fonts-liberation libappindicator1 libnss3 lsb-release xdg-utils wget libgbm-dev libxshmfence-dev
RUN sudo npm install --global --unsafe-perm puppeteer@14.0.0
RUN sudo chmod -R o+rx /usr/lib/node_modules/puppeteer/.local-chromium
# RUN sudo chmod -R o+rx /usr/lib/node_modules/puppeteer/node_modules/puppeteer-core/.local-chromium

RUN /usr/sbin/phpenmod mcrypt

WORKDIR /var/www/app

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

RUN rm -f /etc/nginx/nginx.conf
RUN rm -f /etc/nginx/sites-enabled/default
ADD . /var/www/app
ADD ./docker/nginx /etc/nginx


RUN chown -R www-data:www-data /var/www/app
RUN chmod -R 777 /var/www/app/storage
RUN chmod -R 777 /var/www/app/bootstrap/cache

RUN chown -R www-data:www-data /var/log/supervisor/ &&\
    chown -R www-data:www-data /etc/nginx/

COPY --chown=www:www . /var/www/app

COPY . .
COPY package*.json /var/www/app/
#copy environment file
COPY ./.env.example ./.env

RUN composer install

RUN php artisan key:generate --ansi

RUN php artisan storage:link

# Install Node.js
ENV NODE_VERSION=16.13.0
RUN apt install -y curl
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"
RUN node --version
RUN npm --version

EXPOSE 8000

CMD ["/bin/bash", "./docker/entrypoint.sh"]