<?php
    ini_set("allow_url_fopen", 1);
    $group_id = "818546"; // ID группы
    $topic_id = "33011617"; // ID обсуждения
    $access_token = "352b90c6352b90c6352b90c60635428f333352b352b90c669abae56a993e611c2fe70a7"; // токен

    $count = 100; // Количество комментариев, которое будет выведено
    $extended = 1; // Будут ли загружены профили
    $need_likes = 1; // Будут ли загружены лайки
    $sort = "desc"; // Отображаем с начала(asc) или конца(desc)
    $version = "5.4"; // Версия VK API (На текущий момент менять не нужно)

    $page = file_get_contents("https://api.vk.com/method/board.getComments?" . "group_id=" . $group_id . "&topic_id=" . $topic_id . "&access_token=" . $access_token . "&count=" . $count . "&extended=" . $extended . "&need_likes=" . $need_likes . "&sort=" . $sort . "&v=" . $version);


    echo $page;

    /* Если не срабатывает php код и страница с JSON пустая, то потребуется закомментировать $page и echo $page и раскомментировать код ниже */

    // $page = "https://api.vk.com/method/board.getComments?" . "group_id=" . $group_id . "&topic_id=" . $topic_id . "&count=" . $count . "&extended=" . $extended . "&need_likes=" . $need_likes . "&sort=" . $sort . "&v=" . $version";

    // function file_get_contents_curl($url) {
  //   $ch = curl_init();
  //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //   curl_setopt($ch, CURLOPT_URL, $url);
  //   $data = curl_exec($ch);
  //   curl_close($ch);
  //   return $data;
    // }
    //
    // echo file_get_contents_curl($page);
?>
