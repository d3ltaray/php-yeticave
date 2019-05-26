<?php $formClass = (count($errors) > 0) ? "form--invalid" : ""; ?>
<form class="form form--add-lot container <?=$formClass; ?>" action="http://php-yeticave/add.php"
      method="post" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <?php
        $classname =isset($errors['lot-name']) ? "form__item--invalid" : "";
        $inputValue = isset($lot['lot-name']) ? $lot['lot-name'] : "";
        $inputSpan = isset($errors['lot-name']) ? $errors['lot-name'] : "Введите наименование лота";
        ?>
        <div class="form__item <?=$classname; ?>">
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота"
                   value="<?=$inputValue; ?>">
            <span class="form__error"><?=$inputSpan; ?></span>
        </div>
        <?php
        $classname = isset($errors['category']) ? "form__item--invalid" : "";
        $inputValue = isset($lot['category']) ? $lot['category'] : "Выберите категорию";
        $inputSpan = isset($errors['category']) ? $errors['category'] : "Выберите категорию";
        ?>
        <div class="form__item <?=$classname; ?>">
            <label for="category">Категория</label>
            <select id="category" name="category">
                <option><?=$inputValue;?></option>
                <?php foreach ($categories as $value) : ?>
                <option><?=$value;?></option>
                <?php endforeach; ?>
            </select>
            <span class="form__error"><?=$inputSpan; ?></span>
        </div>
    </div>
        <?php
        $classname = isset($errors['message']) ? "form__item--invalid" : "";
        $inputValue = isset($lot['message']) ? $lot['message'] : "";
        $inputSpan = isset($errors['message']) ? $errors['message'] : "Введите описание лота";
        ?>
    <div class="form__item form__item--wide <?=$classname; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?=$inputValue; ?></textarea>
        <span class="form__error"><?=$inputSpan; ?></span>
    </div>
        <?php
        $classname = isset($errors['lot-img']) ? "form__item--invalid" : "";
        $inputValue = isset($lot['lot-img']) ? $lot['lot-img'] : '';
        $inputSpan = isset($errors['lot-img']) ? $errors['lot-img'] : "Добавить";
        ?>
    <div class="form__item form__item--file">
        <label>Изображение</label>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="lot-img" name="lot-img" value="<?=$inputValue; ?>">
            <label for="lot-img">
                <span><?=$inputSpan; ?></span>
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <?php
        $classname = isset($errors['lot-rate']) ? "form__item--invalid" : "";
        $inputValue = isset($lot['lot-rate']) ? $lot['lot-rate'] : "0";
        $inputSpan = isset($errors['lot-rate']) ? $errors['lot-rate'] : "Введите стартовую цену";
        ?>
        <div class="form__item form__item--small <?=$classname; ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=$inputValue; ?>">
            <span class="form__error"><?=$inputSpan; ?></span>
        </div>
        <?php
        $classname = isset($errors['lot-step']) ? "form__item--invalid" : "";
        $inputValue = isset($lot['lot-step']) ? $lot['lot-step'] : "0";
        $inputSpan = isset($errors['lot-step']) ? $errors['lot-step'] : "Введите шаг ставки";
        ?>
        <div class="form__item form__item--small <?=$classname; ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=$inputValue; ?>">
            <span class="form__error"><?=$inputSpan; ?></span>
        </div>
        <?php
        $classname = isset($errors['lot-date']) ? "form__item--invalid" : "";
        $inputValue = isset($lot['lot-date']) ? $lot['lot-date'] : "дд.мм.гггг";
        $inputSpan = isset($errors['lot-date']) ? $errors['lot-date'] : "Введите дату окончания торгов";
        ?>
        <div class="form__item <?=$classname; ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?=$inputValue; ?>">
            <span class="form__error"><?=$inputSpan; ?></span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>