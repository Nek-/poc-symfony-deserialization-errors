POC for Sf Dernormalizer error management
=========================================


Install
-------

```
composer install
```

Serve
-----

```
bin/console server:run
```

Test
----

Considering the app started on port 8000:

```
curl --request PUT \
  --url http://localhost:8000/article \
  --data '{
	"publishAt": "",
	"title": "Hello world",
	"content": "Some awesome uncredible content."
}'
```
