# String Search

- [x] Нужно создать библиотеку, которая сможет искать в файле вхождение строки, и
выдавать номер строки в файле и позицию в строке. Файл может быть
произвольного размера.
- [ ] Дополнительно: предусмотреть ограничения (максимальный размер файла, его
mime-type, и т.п.). Желательно их вынести в отдельный yaml конфиг.
- [ ] Дополнительно: покрыть код тестами.
- [x] Дополнительно: сделать возможность добавления модулей для разных
механизмов поиска (например, если нужно искать не вхождение, а сравнивать
хэш-суммы, и т.п.)
- [ ] Дополнительно: сделать возможность читать данные не только с локальной
файловой системы, но и удаленной.


Пример использования

```php
//Задаем источник данных
//Создаем простой поиск
$query = new BaseQueryBuilder();
//Читаем файл на localhost'e
$result = $query->setSource('text.txt')->findSubstring('охотился')->getValue();

$queryRegex = RegexQueryBuilder();
$resultRegex = $queryRegex->setSource('text.txt')->findSubstring('/охотился/')->getValue();
echo $resultRegex->getData();
```
