<?php ?>



<div id='content'>
    <div id="center">



        <div id="translator">
            
            <div class="text_field">
                <div class="action_field">
                    <select>
                        <option value="english">English</option>
                    </select>
                </div>
                <textarea id="translation_text" type="text" name="translation_text" placeholder="Enter text to translate"></textarea>
            </div>

            <div class="text_field">
                <div class="action_field">
                    <select>
                        <option value="english">Russian</option>
                    </select>
                    <button id="translate">Translate</button>
                </div>
                
                <div id="translation_result">
                    <span id="main_result"></span>
                </div>
            </div>


            <br>      
            <span id="ya_ad">
                <a href='http://translate.yandex.com/' style='text-decoration: none'>Powered by Yandex.Translate</a>
            </span>


        </div>

    </div>   

</div>

<script>
</script>
