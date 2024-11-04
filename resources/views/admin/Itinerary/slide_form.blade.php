<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Update Package Slide 1
        </h2>
    </x-slot>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
                    <div class="bg-white shadow-md rounded-lg">
                        <div class="p-4 border-b">
                            <h3 class="text-xl font-semibold">Update Package Slide 1</h3>
                        </div>
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                        <!-- form start -->
                        <form action="php_action/slide1.php" method="POST" enctype="multipart/form-data" class="p-4">
                            <div class="space-y-4">

                                <div>
                                    <x-input-label for="package_name" class="block text-sm font-medium text-gray-700">Package Name</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="package_name" name="package_name" placeholder="Enter Package Name" value="Sikim" required readonly />
                                </div>

                                <div>
                                    <x-input-label for="s1_text1" class="block text-sm font-medium text-gray-700">Slider1 Text1</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_text1" name="s1_text1" value="Here is your customized itinerary1" maxlength="33" />
                                </div>

                                <div>
                                    <x-input-label for="s1_anim_text2" class="block text-sm font-medium text-gray-700">Slider1 Animation Text2</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_anim_text2" name="s1_anim_text2" value="Fun Filling" maxlength="30" />
                                </div>

                                <div>
                                    <x-input-label for="s1_text3" class="block text-sm font-medium text-gray-700">Slider1 Text3</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_text3" name="s1_text3" value="Thanks For Choosing Carrnival Trips!" maxlength="40" />
                                </div>

                                <div>
                                    <x-input-label for="s1_squre_box_text" class="block text-sm font-medium text-gray-700">Slider1 Square Box Text</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_squre_box_text" name="s1_squre_box_text" value="Booking1" maxlength="10" />
                                </div>

                                <div>
                                    <x-input-label for="s1_btn1" class="block text-sm font-medium text-gray-700">Slider1 Button 1</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_btn1" name="s1_btn1" value="Let,s get started" maxlength="20" />
                                </div>

                                <div>
                                    <x-input-label for="s1_btn2" class="block text-sm font-medium text-gray-700">Slider1 Button 2</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_btn2" name="s1_btn2" value="button" maxlength="20" />
                                </div>

                                <div>
                                    <x-input-label for="s1_img" class="block text-sm font-medium text-gray-700">Slider1 Image</x-input-label>
                                    <x-text-input type="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_img" name="s1_img" />
                                    <img width="100" height="80" class="mt-3" id="disp_s1_img" src="img/1001057915.jpg" />
                                </div>

                                <div>
                                    <x-input-label for="s2_text1" class="block text-sm font-medium text-gray-700">Slider2 Text1</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_text1" name="s2_text1" value="Here is your customized itinerary1" maxlength="33" />
                                </div>

                                <div>
                                    <x-input-label for="s2_anim_text2" class="block text-sm font-medium text-gray-700">Slider2 Animation Text2</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_anim_text2" name="s2_anim_text2" value="refreshing" maxlength="30" />
                                </div>

                                <div>
                                    <x-input-label for="s2_text3" class="block text-sm font-medium text-gray-700">Slider2 Text3</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_text3" name="s2_text3" maxlength="40" />
                                </div>

                                <div>
                                    <x-input-label for="s2_squre_box_text" class="block text-sm font-medium text-gray-700">Slider2 Square Box Text</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_squre_box_text" name="s2_squre_box_text" value="Booking 22" maxlength="10" />
                                </div>

                                <div>
                                    <x-input-label for="s2_btn1" class="block text-sm font-medium text-gray-700">Slider2 Button 1</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_btn1" name="s2_btn1" value="Let,s get started 2" maxlength="20" />
                                </div>

                                <div>
                                    <x-input-label for="s2_btn2" class="block text-sm font-medium text-gray-700">Slider2 Button 2</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_btn2" name="s2_btn2" maxlength="20" />
                                </div>

                                <div>
                                    <x-input-label for="s2_img" class="block text-sm font-medium text-gray-700">Slider2 Image</x-input-label>
                                    <x-text-input type="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_img" name="s2_img" />
                                    <img width="100" height="80" class="mt-3" id="disp_s2_img" src="img/1390332316.jpg" />
                                </div>

                                <div>
                                    <x-input-label for="s3_text1" class="block text-sm font-medium text-gray-700">Slider3 Text1</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_text1" name="s3_text1" value="Here is your customized itinerary1" maxlength="33" />
                                </div>

                                <div>
                                    <x-input-label for="s3_anim_text2" class="block text-sm font-medium text-gray-700">Slider3 Animation Text2</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_anim_text2" name="s3_anim_text2" value="fun filling" maxlength="30" />
                                </div>

                                <div>
                                    <x-input-label for="s3_text3" class="block text-sm font-medium text-gray-700">Slider3 Text3</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_text3" name="s3_text3" maxlength="40" />
                                </div>

                                <div>
                                    <x-input-label for="s3_squre_box_text" class="block text-sm font-medium text-gray-700">Slider3 Square Box Text</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_squre_box_text" name="s3_squre_box_text" maxlength="10" />
                                </div>

                                <div>
                                    <x-input-label for="s3_btn1" class="block text-sm font-medium text-gray-700">Slider3 Button 1</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_btn1" name="s3_btn1" maxlength="20" />
                                </div>

                                <div>
                                    <x-input-label for="s3_btn2" class="block text-sm font-medium text-gray-700">Slider3 Button 2</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_btn2" name="s3_btn2" maxlength="20" />
                                </div>

                                <div>
                                    <x-input-label for="s3_img" class="block text-sm font-medium text-gray-700">Slider3 Image</x-input-label>
                                    <x-text-input type="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_img" name="s3_img" />
                                    <img width="100" height="80" class="mt-3" id="disp_s3_img" src="img/844050082.jpg" />
                                </div>

                            </div>
                            <input type="hidden" id="id" name="id" value="2">
                            <input type="hidden" id="img1" name="img1" value="1001057915.jpg">
                            <input type="hidden" id="img2" name="img2" value="1390332316.jpg">
                            <input type="hidden" id="img3" name="img3" value="844050082.jpg">

                            <div class="mt-4">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded" name="edit_package_info_slide1">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</x-admin.app-layout>
