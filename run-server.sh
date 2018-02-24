docker run -d \
    --name training-rookie-guestbook \
    -v $(pwd):/guestbook \
    -p 8811:80 \
    --rm \
    hub.babydev.de/training/rookie-guestbook:php \
    php -S 0.0.0.0:80 /guestbook/index.php
