<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Plus+Jakarta+Sans%3Awght%40400%3B500%3B700%3B800"
    />

    <title>Stitch Design</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden" style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f4f0f0] px-10 py-3">
          <div class="flex items-center gap-8">
            <div class="flex items-center gap-4 text-[#181111]">
              <div class="size-4">
                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M44 4H30.6666V17.3334H17.3334V30.6666H4V44H44V4Z" fill="currentColor"></path></svg>
              </div>
              <h2 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em]">StyleHub</h2>
            </div>
            <div class="flex items-center gap-9">
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">New Arrivals</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Men</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Women</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Accessories</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Sale</a>
            </div>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <label class="flex flex-col min-w-40 !h-10 max-w-64">
              <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                <div
                  class="text-[#886364] flex border-none bg-[#f4f0f0] items-center justify-center pl-4 rounded-l-lg border-r-0"
                  data-icon="MagnifyingGlass"
                  data-size="24px"
                  data-weight="regular"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"
                    ></path>
                  </svg>
                </div>
                <input
                  placeholder="Search"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-full placeholder:text-[#886364] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                  value=""
                />
              </div>
            </label>
            <div class="flex gap-2">
              <button
                class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f4f0f0] text-[#181111] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5"
              >
                <div class="text-[#181111]" data-icon="Heart" data-size="20px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M178,32c-20.65,0-38.73,8.88-50,23.89C116.73,40.88,98.65,32,78,32A62.07,62.07,0,0,0,16,94c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,220.66,240,164,240,94A62.07,62.07,0,0,0,178,32ZM128,206.8C109.74,196.16,32,147.69,32,94A46.06,46.06,0,0,1,78,48c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,147.61,146.24,196.15,128,206.8Z"
                    ></path>
                  </svg>
                </div>
              </button>
              <button
                class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f4f0f0] text-[#181111] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5"
              >
                <div class="text-[#181111]" data-icon="ShoppingBag" data-size="20px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"
                    ></path>
                  </svg>
                </div>
              </button>
            </div>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap gap-2 p-4">
              <a class="text-[#886364] text-base font-medium leading-normal" href="#">Men</a>
              <span class="text-[#886364] text-base font-medium leading-normal">/</span>
              <span class="text-[#181111] text-base font-medium leading-normal">T-Shirts</span>
            </div>
            <h1 class="text-[#181111] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 text-left pb-3 pt-5">Classic Cotton Crewneck T-Shirt</h1>
            <p class="text-[#181111] text-base font-normal leading-normal pb-3 pt-1 px-4">
              A timeless essential, this crewneck t-shirt is crafted from soft, breathable cotton for all-day comfort. Its classic fit and versatile design make it a wardrobe
              staple.
            </p>
            <div class="flex w-full grow bg-white @container p-4">
              <div class="w-full gap-1 overflow-hidden bg-white @[480px]:gap-2 aspect-[2/3] rounded-lg flex">
                <div
                  class="w-full bg-center bg-no-repeat bg-cover aspect-auto rounded-none flex-1"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAnAkLQZUv_g-3e-v7Owjq4qnf3D1u3TLrWlPry1mkNpi5zHz8c-MHYktMdAWXwHZw9GtyY3st0wycDjEgzgYO78n2qYec2dvquUDaxW5njMmQNX1IPSavcHiLXv4Dp34xyzs0_LN8XA1JOI5c7onOyr7RMjfmgpcNi3S3eD4t9fPEIgKuRvxAL9IMyWa_hVm5nKsnFweouafCTXOTQc3ij8AnMP5-FJIg8cu2HyvwRsnKV3d1BmVTj4-jZNCqdXgf7kwVtgfz8Zhs");'
                ></div>
              </div>
            </div>
            <h3 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Select Size</h3>
            <div class="flex flex-wrap gap-3 p-4">
              <label
                class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e5dcdc] px-4 h-11 text-[#181111] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#e92932] relative cursor-pointer"
              >
                XS
                <input type="radio" class="invisible absolute" name="61862b04-7d55-4bc0-a19a-a3718d85e7c6" />
              </label>
              <label
                class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e5dcdc] px-4 h-11 text-[#181111] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#e92932] relative cursor-pointer"
              >
                S
                <input type="radio" class="invisible absolute" name="61862b04-7d55-4bc0-a19a-a3718d85e7c6" />
              </label>
              <label
                class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e5dcdc] px-4 h-11 text-[#181111] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#e92932] relative cursor-pointer"
              >
                M
                <input type="radio" class="invisible absolute" name="61862b04-7d55-4bc0-a19a-a3718d85e7c6" />
              </label>
              <label
                class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e5dcdc] px-4 h-11 text-[#181111] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#e92932] relative cursor-pointer"
              >
                L
                <input type="radio" class="invisible absolute" name="61862b04-7d55-4bc0-a19a-a3718d85e7c6" />
              </label>
              <label
                class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e5dcdc] px-4 h-11 text-[#181111] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#e92932] relative cursor-pointer"
              >
                XL
                <input type="radio" class="invisible absolute" name="61862b04-7d55-4bc0-a19a-a3718d85e7c6" />
              </label>
            </div>
            <h3 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Select Color</h3>
            <div class="flex flex-wrap gap-5 p-4">
              <label
                class="size-10 rounded-full border border-[#e5dcdc] ring-[color-mix(in_srgb,#181111_50%,_transparent)] has-[:checked]:border-[3px] has-[:checked]:border-white has-[:checked]:ring"
                style="background-color: rgb(0, 0, 0);"
              >
                <input type="radio" class="invisible" name="44324af8-45d8-4929-b3e2-8f668ebc7ed3" checked="" />
              </label>
              <label
                class="size-10 rounded-full border border-[#e5dcdc] ring-[color-mix(in_srgb,#181111_50%,_transparent)] has-[:checked]:border-[3px] has-[:checked]:border-white has-[:checked]:ring"
                style="background-color: rgb(255, 255, 255);"
              >
                <input type="radio" class="invisible" name="44324af8-45d8-4929-b3e2-8f668ebc7ed3" />
              </label>
              <label
                class="size-10 rounded-full border border-[#e5dcdc] ring-[color-mix(in_srgb,#181111_50%,_transparent)] has-[:checked]:border-[3px] has-[:checked]:border-white has-[:checked]:ring"
                style="background-color: rgb(0, 0, 255);"
              >
                <input type="radio" class="invisible" name="44324af8-45d8-4929-b3e2-8f668ebc7ed3" />
              </label>
              <label
                class="size-10 rounded-full border border-[#e5dcdc] ring-[color-mix(in_srgb,#181111_50%,_transparent)] has-[:checked]:border-[3px] has-[:checked]:border-white has-[:checked]:ring"
                style="background-color: rgb(255, 0, 0);"
              >
                <input type="radio" class="invisible" name="44324af8-45d8-4929-b3e2-8f668ebc7ed3" />
              </label>
            </div>
            <div class="flex justify-stretch">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-start">
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#e92932] text-white text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Add to Cart</span>
                </button>
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f4f0f0] text-[#181111] text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Buy Now</span>
                </button>
              </div>
            </div>
            <h3 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Product Details</h3>
            <div class="p-4 grid grid-cols-[20%_1fr] gap-x-6">
              <div class="col-span-2 grid grid-cols-subgrid border-t border-t-[#e5dcdc] py-5">
                <p class="text-[#886364] text-sm font-normal leading-normal">Material</p>
                <p class="text-[#181111] text-sm font-normal leading-normal">100% Cotton</p>
              </div>
              <div class="col-span-2 grid grid-cols-subgrid border-t border-t-[#e5dcdc] py-5">
                <p class="text-[#886364] text-sm font-normal leading-normal">Fit</p>
                <p class="text-[#181111] text-sm font-normal leading-normal">Classic Fit</p>
              </div>
              <div class="col-span-2 grid grid-cols-subgrid border-t border-t-[#e5dcdc] py-5">
                <p class="text-[#886364] text-sm font-normal leading-normal">Care Instructions</p>
                <p class="text-[#181111] text-sm font-normal leading-normal">Machine wash cold</p>
              </div>
            </div>
            <h3 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Customer Reviews</h3>
            <div class="flex flex-wrap gap-x-8 gap-y-6 p-4">
              <div class="flex flex-col gap-2">
                <p class="text-[#181111] text-4xl font-black leading-tight tracking-[-0.033em]">4.5</p>
                <div class="flex gap-0.5">
                  <div class="text-[#181111]" data-icon="Star" data-size="18px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="18px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="18px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="18px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="18px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M239.2,97.29a16,16,0,0,0-13.81-11L166,81.17,142.72,25.81h0a15.95,15.95,0,0,0-29.44,0L90.07,81.17,30.61,86.32a16,16,0,0,0-9.11,28.06L66.61,153.8,53.09,212.34a16,16,0,0,0,23.84,17.34l51-31,51.11,31a16,16,0,0,0,23.84-17.34l-13.51-58.6,45.1-39.36A16,16,0,0,0,239.2,97.29Zm-15.22,5-45.1,39.36a16,16,0,0,0-5.08,15.71L187.35,216v0l-51.07-31a15.9,15.9,0,0,0-16.54,0l-51,31h0L82.2,157.4a16,16,0,0,0-5.08-15.71L32,102.35a.37.37,0,0,1,0-.09l59.44-5.14a16,16,0,0,0,13.35-9.75L128,32.08l23.2,55.29a16,16,0,0,0,13.35,9.75L224,102.26S224,102.32,224,102.33Z"
                      ></path>
                    </svg>
                  </div>
                </div>
                <p class="text-[#181111] text-base font-normal leading-normal">125 reviews</p>
              </div>
              <div class="grid min-w-[200px] max-w-[400px] flex-1 grid-cols-[20px_1fr_40px] items-center gap-y-3">
                <p class="text-[#181111] text-sm font-normal leading-normal">5</p>
                <div class="flex h-2 flex-1 overflow-hidden rounded-full bg-[#e5dcdc]"><div class="rounded-full bg-[#181111]" style="width: 40%;"></div></div>
                <p class="text-[#886364] text-sm font-normal leading-normal text-right">40%</p>
                <p class="text-[#181111] text-sm font-normal leading-normal">4</p>
                <div class="flex h-2 flex-1 overflow-hidden rounded-full bg-[#e5dcdc]"><div class="rounded-full bg-[#181111]" style="width: 30%;"></div></div>
                <p class="text-[#886364] text-sm font-normal leading-normal text-right">30%</p>
                <p class="text-[#181111] text-sm font-normal leading-normal">3</p>
                <div class="flex h-2 flex-1 overflow-hidden rounded-full bg-[#e5dcdc]"><div class="rounded-full bg-[#181111]" style="width: 15%;"></div></div>
                <p class="text-[#886364] text-sm font-normal leading-normal text-right">15%</p>
                <p class="text-[#181111] text-sm font-normal leading-normal">2</p>
                <div class="flex h-2 flex-1 overflow-hidden rounded-full bg-[#e5dcdc]"><div class="rounded-full bg-[#181111]" style="width: 10%;"></div></div>
                <p class="text-[#886364] text-sm font-normal leading-normal text-right">10%</p>
                <p class="text-[#181111] text-sm font-normal leading-normal">1</p>
                <div class="flex h-2 flex-1 overflow-hidden rounded-full bg-[#e5dcdc]"><div class="rounded-full bg-[#181111]" style="width: 5%;"></div></div>
                <p class="text-[#886364] text-sm font-normal leading-normal text-right">5%</p>
              </div>
            </div>
            <div class="flex flex-col gap-8 overflow-x-hidden bg-white p-4">
              <div class="flex flex-col gap-3 bg-white">
                <div class="flex items-center gap-3">
                  <div
                    class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD64gf0Rh_J4WHdxXA4JQwjNUEN2tW2ySiaUHqCgNKOMxCH-B4AURmGMfdKwk4MPWe8QnTUGExHFXtQ1YzgeoxxQJJ7-qg8B-6C4Isqj8XdlnN-imJlfrw2QS3DTHW_hL4wb_QEoly7HcRsUuKLIU-_-3Rl75lNe71rjVcMCVU8h4hwLfgRcbDO30oRB9S7gcSuNIs_sLw6BuSVsu9vhHxXq8KI0fYbFmFguiPKZOx5KUmsU7YR3j5QV6sqCKPaRZwljFX1JV__ylc");'
                  ></div>
                  <div class="flex-1">
                    <p class="text-[#181111] text-base font-medium leading-normal">Ethan Carter</p>
                    <p class="text-[#886364] text-sm font-normal leading-normal">2023-08-15</p>
                  </div>
                </div>
                <div class="flex gap-0.5">
                  <div class="text-[#181111]" data-icon="Star" data-size="20px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="20px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="20px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="20px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="20px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                </div>
                <p class="text-[#181111] text-base font-normal leading-normal">
                  This t-shirt is incredibly comfortable and fits perfectly. The material is soft and breathable, making it ideal for everyday wear. I highly recommend it!
                </p>
                <div class="flex gap-9 text-[#886364]">
                  <button class="flex items-center gap-2">
                    <div class="text-inherit" data-icon="ThumbsUp" data-size="20px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-inherit">25</p>
                  </button>
                  <button class="flex items-center gap-2">
                    <div class="text-inherit" data-icon="ThumbsDown" data-size="20px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M239.82,157l-12-96A24,24,0,0,0,204,40H32A16,16,0,0,0,16,56v88a16,16,0,0,0,16,16H75.06l37.78,75.58A8,8,0,0,0,120,240a40,40,0,0,0,40-40V184h56a24,24,0,0,0,23.82-27ZM72,144H32V56H72Zm150,21.29a7.88,7.88,0,0,1-6,2.71H152a8,8,0,0,0-8,8v24a24,24,0,0,1-19.29,23.54L88,150.11V56H204a8,8,0,0,1,7.94,7l12,96A7.87,7.87,0,0,1,222,165.29Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-inherit">5</p>
                  </button>
                </div>
              </div>
              <div class="flex flex-col gap-3 bg-white">
                <div class="flex items-center gap-3">
                  <div
                    class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuByJJAjhv9c082v8GL150YR-nXLD_P5M7ZnWSZoQEj7M0w92fKWZ4EjfN_lwzEi27b4iHmc8y3u5LdHdIT1Txy-r01ok3cPghZW-teRyRzXHn83BgCDQ7sZlhMrI4GqlkQ1IK-EXi_HXGTV_6NcsdBOCta-credhHvFm38ShiGdVEWY1fiWqkmqkfmkTHNSutPxdjk99p9ssKleJXIIhucQEdfzhRCauiJ59Vu2eNNXVhEm2CCD7iUiqthkhm8NooHxbbsEKE7SNiY");'
                  ></div>
                  <div class="flex-1">
                    <p class="text-[#181111] text-base font-medium leading-normal">Olivia Bennett</p>
                    <p class="text-[#886364] text-sm font-normal leading-normal">2023-07-22</p>
                  </div>
                </div>
                <div class="flex gap-0.5">
                  <div class="text-[#181111]" data-icon="Star" data-size="20px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="20px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="20px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#181111]" data-icon="Star" data-size="20px" data-weight="fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"
                      ></path>
                    </svg>
                  </div>
                  <div class="text-[#cebbbc]" data-icon="Star" data-size="20px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M239.2,97.29a16,16,0,0,0-13.81-11L166,81.17,142.72,25.81h0a15.95,15.95,0,0,0-29.44,0L90.07,81.17,30.61,86.32a16,16,0,0,0-9.11,28.06L66.61,153.8,53.09,212.34a16,16,0,0,0,23.84,17.34l51-31,51.11,31a16,16,0,0,0,23.84-17.34l-13.51-58.6,45.1-39.36A16,16,0,0,0,239.2,97.29Zm-15.22,5-45.1,39.36a16,16,0,0,0-5.08,15.71L187.35,216v0l-51.07-31a15.9,15.9,0,0,0-16.54,0l-51,31h0L82.2,157.4a16,16,0,0,0-5.08-15.71L32,102.35a.37.37,0,0,1,0-.09l59.44-5.14a16,16,0,0,0,13.35-9.75L128,32.08l23.2,55.29a16,16,0,0,0,13.35,9.75L224,102.26S224,102.32,224,102.33Z"
                      ></path>
                    </svg>
                  </div>
                </div>
                <p class="text-[#181111] text-base font-normal leading-normal">
                  Great quality t-shirt for the price. The color is vibrant and hasn't faded after multiple washes. The fit is true to size.
                </p>
                <div class="flex gap-9 text-[#886364]">
                  <button class="flex items-center gap-2">
                    <div class="text-inherit" data-icon="ThumbsUp" data-size="20px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-inherit">18</p>
                  </button>
                  <button class="flex items-center gap-2">
                    <div class="text-inherit" data-icon="ThumbsDown" data-size="20px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M239.82,157l-12-96A24,24,0,0,0,204,40H32A16,16,0,0,0,16,56v88a16,16,0,0,0,16,16H75.06l37.78,75.58A8,8,0,0,0,120,240a40,40,0,0,0,40-40V184h56a24,24,0,0,0,23.82-27ZM72,144H32V56H72Zm150,21.29a7.88,7.88,0,0,1-6,2.71H152a8,8,0,0,0-8,8v24a24,24,0,0,1-19.29,23.54L88,150.11V56H204a8,8,0,0,1,7.94,7l12,96A7.87,7.87,0,0,1,222,165.29Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-inherit">3</p>
                  </button>
                </div>
              </div>
            </div>
            <h3 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Related Products</h3>
            <div class="flex overflow-y-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
              <div class="flex items-stretch p-4 gap-3">
                <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-40">
                  <div
                    class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDXjye9e6y4QG8msAItGFTthKGojRRNGPycRV6lxvisluOhXM_TPXsPfl_RQj8oG6khpbt6_4iA52WRimXUY6tK1t-Y8qaj47LCd3POf0ljyaHM95E8G-ls9KfNLHLWnt3abl4L_GSReZEsyhD70BV_dGM77vOwrRbj7YQgi8-l5xOmyFlms0trIkGJkalWkzt2rEvQPyhTN9nFd_2BBXUSSL5lcdJYpnkhZaYDSnNIvAX_peRl4kOGECPfPOrsYHltVoTUODjKeDg");'
                  ></div>
                  <div>
                    <p class="text-[#181111] text-base font-medium leading-normal">Slim Fit Jeans</p>
                    <p class="text-[#886364] text-sm font-normal leading-normal">$79.99</p>
                  </div>
                </div>
                <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-40">
                  <div
                    class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDGVn3qwBk7vZGAlfoi8w4Dh6xMZyyUu7_tBsqhCn-cozlniGaJm-04MoJHKWh3LvjzwmhULJR6NXTLo8-QcyzVPaG4Yl_o6NOxfg5jybQCQYu_GSgdwcBVNQGJXNG-IPxi_xfB8kbXexXLNBRbK5AGvMpw45LySrW87_3Tf-r33P-f2KIUz2MHE5jSdMiQpOxsIymqmBxR_q6GmaX0S_OOfSxs5n1_svBS_BfCCacF6hAFIzbfKx1GhSGBmgFNIdYHPmMAfltW_Bg");'
                  ></div>
                  <div>
                    <p class="text-[#181111] text-base font-medium leading-normal">Casual Sneakers</p>
                    <p class="text-[#886364] text-sm font-normal leading-normal">$59.99</p>
                  </div>
                </div>
                <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-40">
                  <div
                    class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDifSkjLyyFEsVcjRs92tS34_HtOFzoRTEjIzZIQeAVnQdwjxNV1mvVH0cyAf9LS5Y3t435e1Qt9UprH4RNzdJK27_okBw6VBIsRO-PUDZe4QJXuJWrAF30IUobJnxNLfb-IHmJfKdmAd3E1GFJcdwHXyMTEIZqjVzzf1BQJBiz5CXdABgk7G2jvOFfroyiNyMhLDtyKgfWvHPfx3K91mykLyY-ghzTB1UC2KeSXK_QdSH1nMXvQGn5DugjZUlPTr3iX6zY1wPjwmo");'
                  ></div>
                  <div>
                    <p class="text-[#181111] text-base font-medium leading-normal">Leather Belt</p>
                    <p class="text-[#886364] text-sm font-normal leading-normal">$39.99</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
