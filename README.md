# Searching for a subarray in an array

`XIX` Задача о поиске элемента ⭐⭐

Дан упорядоченный массив чисел размером `N`
Нужно реализовать алгоритм поиска вхождения упорядоченного подмассива размера `M`, где `M << N`

```
func isInclude(array int[], subarray []int) bool

assert(isInclude([1, 2, 3, 5, 7, 9, 11], []) == true) 
assert(isInclude([1, 2, 3, 5, 7, 9, 11], [3, 5, 7]) == true) 
assert(isInclude([1, 2, 3, 5, 7, 9, 11], [4, 5, 7]) == false) 
``` 

Что хочется увидеть:
1. Алгоритм со сложность быстрее чем `O(N)` по времени

## Requirements

- [Docker] (https://docs.docker.com)

## Init sandbox.

- Install Docker

- First use project. initialization project
```shell
$ git clone https://github.com/whdigger/ozone.git ozone
$ cd ozone
$ make
$ make shell
$ phpunit
```

After configuration the site should be available by http://localhost:8080 