FROM nginx:1.15.7-alpine

ADD ./default.conf /etc/nginx/conf.d/default.conf