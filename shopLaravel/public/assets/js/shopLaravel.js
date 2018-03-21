$document = $(document);

$document.ready(function () {
    // 文件載入完成
    $document.on("click", '.setLanguage', function (event) {
        // 點選 .setLanguage HTML tag
        event.stopPropagation();
        event.preventDefault();
        // 取得語言設定
        var language = this.dataset.language;

        // Cookie 設定語系偏好
        Cookies.set('shopLaravelLanguage', language);

        // 重新載入頁面
        location.reload();
    });
});