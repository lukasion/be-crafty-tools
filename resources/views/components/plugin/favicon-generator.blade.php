<form action="" method="POST" class="mt-4" enctype="multipart/form-data">
    @csrf

    <div class="flex flex-col md:flex-row justify-between">
        <div class="w-full md:w-2/3">
            <h2 class="font-bold text-black text-center mb-4 mt-6">
                Upload an image to generate favicon
            </h2>

            <div class="flex flex-col gap-2 items-center">
                <label for="upload"
                       class="border border-gray-300 w-full md:w-[500px] flex justify-center items-center gap-4 px-4 py-6 cursor-pointer js-label">
                    <span class="js-preview"></span>
                    <span class="js-text"> Click here to upload an image.</span>
                </label>

                <input type="file" name="upload" class="hidden" id="upload" accept="image/*">

                <div>
                    <button type="submit"
                            class="js-submit bg-blue-500 text-white px-4 py-2 rounded-lg inline-block mt-2">
                        Generate favicon
                    </button>

                    <p class="js-submitText"></p>
                </div>
            </div>

            @if ($errors->has('upload'))
                <p class="text-red-500 mt-2">{{ $errors->first('upload') }}</p>
            @endif


            @if (session('error'))
                <p class="text-red-500 mt-2">{{ session('error') }}</p>
            @endif
        </div>
        <div class="w-full md:w-1/3">
            <x-adsense-box class="mt-6"/>
        </div>
    </div>
</form>

<script>
    const upload = document.getElementById('upload');
    const jsLabel = document.querySelector('.js-label');
    const jsPreview = document.querySelector('.js-preview');

    upload.addEventListener('change', function () {
        jsLabel.querySelector('.js-text').innerText = this.files[0].name;

        const reader = new FileReader();
        reader.onload = function (e) {
            jsPreview.innerHTML = `<img src="${e.target.result}" class="w-14 h-14 object-cover">`;
        };
        reader.readAsDataURL(this.files[0]);
    });

    const submit = document.querySelector('.js-submit');
    const submitText = document.querySelector('.js-submitText');

    submit.addEventListener('click', function () {
        submitText.innerText = 'Generating favicon...';
    });

</script>