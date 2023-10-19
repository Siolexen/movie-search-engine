## Movie recommendation search engine

#### Description

The application includes 3 recommendation algorithms:

1. Returns 3 random titles.

2. Returns all movies starting with the letter 'W', but only if they have an even number of characters in the title.

3. Returns all titles that consist of more than 1 word

#### Available parameters
```
http://localhost:8080/movies?strategy=random
```
```
http://localhost:8080/movies?strategy=starting_with_w
```
```
http://localhost:8080/movies?strategy=multi_word
```