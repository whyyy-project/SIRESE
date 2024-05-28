<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= !isset($title) ? "SIRESE | Sistem Rekomendasi Smartphone" : "SIRESE | ".$title ?></title>
    <meta name="author" content="wahyu nur cahyo" />
    <meta name="description" content="description here" />
    <meta name="keywords" content="keywords,here" />

    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/customStyle.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="h-screen overflow-hidden flex items-center justify-center bg-gray-200">
    <div class="min-h-screen bg-gray-200 flex flex-col justify-center py-12">
	<div class="relative py-3 px-3 max-w-xl mx-auto">
		<div class="absolute mx-3 inset-0 bg-gradient-to-r from-cyan-500 to-cyan-950 shadow-lg transform skew-y-0 -rotate-6 rounded-3xl">
		</div>
		<div class="relative bg-white shadow-lg rounded-3xl p-6 md:p-20 md:pt-12">
			<div class="max-w-md mx-auto px-8">
				<div>
            <img src="<?= base_url() ?>img/logo.png" alt="" class="w-14 mx-auto">
					<h1 class="text-base md:text-2xl font-semibold text-center">Login SIRESE</h1>
                <div class="border border-gray-200 m-2"></div>
				</div>
			<form action="<?= base_url() ?>login" method="post">
				<div class="divide-y divide-gray-200">
					<div class="py-3 px-1 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
						<div class="relative">
							<input autocomplete="off" id="username" name="username" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 focus:outline-none focus:border-cyan-700" placeholder="Username" />
							<label for="username" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username</label>
						</div>
						<div class="relative">
							<input autocomplete="off" id="password" name="password" type="password" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 focus:outline-none focus:border-cyan-700" placeholder="Password" />
							<label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
						</div>
						<div class="flex justify-center">
							<button class="btn-login bg-orange-500 shadow-lg text-white text-sm md:text-base hover:bg-orange-400 mt-3">Login</button>
						</div>
                <div class="border border-gray-200"></div>
                        <div class="flex justify-center">

                            <a href="<?= base_url() ?>" class="text-sm md:text-base hover:-translate-y-0.5 hover:duration-100 underline">Kembali ke beranda</a>
                        </div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
