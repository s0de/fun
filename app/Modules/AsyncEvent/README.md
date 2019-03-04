# Модуль обработки ассинхронных событий


## Обработка:

При обработке, например, формы, вызываем ассинхронный триггер:

```php
  protected function triggerFormSaved(ModelForm $form, AsyncEventManagerInterface $asyncEventManager = null)
    {
        if ($asyncEventManager) {
            $asyncEventManager->trigger('forms.saved', [$form->getAttributes()], $form);
        }
    }
```

После удачной обработки форма сохранится в модель **AsyncEvent**.

Для обработки сохраненных данных обычным `$eventManager` вызываем команду: 

```php
yarn phact AsyncEvent Ae
```