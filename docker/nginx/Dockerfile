FROM nginx:latest

RUN mkdir -p /var/www/html && \
    chown -R nginx /var/www/html

COPY docker/nginx/config/default.conf /etc/nginx/conf.d/default.conf
