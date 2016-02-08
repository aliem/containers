USAGE
-----


```
docker run -v ${PWD}/statsite.conf:/statsite.conf aliem/statsite -c /statsite.conf
```

Build on it
===========

```
FROM aliem/alpine

ADD statsite.conf /
ADD mysink /mysink
CMD ["/statsite", "-c", "/statsite.conf"]
```
