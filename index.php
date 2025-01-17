<?php
ob_start('minifier');

function minifier($code)
{
    $search = [
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s',
        '/<!--(.|\s)*?-->/',
        '/\.(jpg|png|webp)([\'"])/i',
        '/<img(?![^>]+loading=)([^>]+)>/i',
    ];

    $replace = [
        '>',
        '<',
        '\\1',
        '',
        '.$1?v=1.0$2',
        '<img loading="lazy" $1>',
    ];

    $code = preg_replace($search, $replace, $code);
    return $code;
}

function generateStrongPassword($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+=<>?';
    $password = '';
    
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, strlen($characters) - 1)];
    }
    
    return $password;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="A free and simple password generator tool. Create secure and random passwords with ease.">
    <meta name="keywords" content="password generator, free password generator, secure passwords, random password, password tool">
    <meta name="author" content="Eelco Greidanus">

    <meta name="robots" content="index,follow">

    <title>Password Generator - pgen.eelcogreidanus.nl</title>

    <link rel="manifest" href="/site.webmanifest" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1J6P7BXCW6"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-1J6P7BXCW6');
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 h-screen">

    <div class="flex items-center justify-center h-screen">
        <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg p-4 max-w-xl w-full m-4">
        <div class="flex">
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                </svg>
            </span>
            <input type="text" id="password" name="password" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?=generateStrongPassword()?>" readonly>
            </div>
        </div>
    </div>

</body>
</html>

<?php
ob_end_flush();
?>
