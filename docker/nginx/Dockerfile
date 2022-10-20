FROM nginx:latest


RUN  mv /etc/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf.old && \
     mkdir -p /var/www/html && \
     chown -R nginx /var/www/html

COPY docker/nginx/config/default.conf /etc/nginx/conf.d/default.conf
