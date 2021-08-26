
<?php include 'components/header.php';navbar();?>
<?php include '../backend/includes/fun.php';   ?>
<?php 
//   $result   =  fetch_all('SELECT cat_id FROM item ');
//   print_r($result->cat_id);
    // $row;

?>

<div id="app">
        <div class="loading">
            <svg width="259" height="105" viewBox="0 0 259 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="path" d="M79.6172 11.7344H46.7109V103H33.2812V11.7344H0.445312V0.625H79.6172V11.7344Z"
                    stroke="#dfb45899" stroke-width="5" />
                <path class="path" stroke="#dfb45899" stroke-width="5"
                    d="M166.875 0.625V70.2344C166.828 79.8906 163.781 87.7891 157.734 93.9297C151.734 100.07 143.578 103.516 133.266 104.266L129.68 104.406C118.477 104.406 109.547 101.383 102.891 95.3359C96.2344 89.2891 92.8594 80.9688 92.7656 70.375V0.625H106.125V69.9531C106.125 77.3594 108.164 83.125 112.242 87.25C116.32 91.3281 122.133 93.3672 129.68 93.3672C137.32 93.3672 143.156 91.3281 147.188 87.25C151.266 83.1719 153.305 77.4297 153.305 70.0234V0.625H166.875Z" />
                <path class="path" d="M258.914 11.7344H226.008V103H212.578V11.7344H179.742V0.625H258.914V11.7344Z"
                    stroke="#dfb45899" stroke-width="5" />
            </svg>
        </div>
        <div class="container">
            <main class="categories">
                <section >
                    <div class="categories-head">
                        <h1>Categories</h1>
                        <input type="text" name="" placeholder="Search" id="" onkeyup="searchItem(this.value,'search_items')" />
                    </div>

                        <div class="categories-content">
                
                            <div class="cat-left" id="catCon">
        
                            </div>
                            <div class="cat-right">
                                <h2>Sorting</h2>
                                <span class="sort-btn">
                                    <?php 
                                        $rows = fetch_all("SELECT cat_id,cat_name FROM categories");
                                        foreach($rows as $row):
                                                ?> 
                                                <span onclick="catSort(<?=trim($row->cat_id)?>)" style="margin-top: 1rem;padding: 1rem;cursor: pointer;"><?=$row->cat_name?></span>
                                            <?php
                                        endforeach;
                                        ?>
                                </span>
                            </div>
                        </div>

                </section>
            </main>
        </div>
    </div>

<?php include 'components/footer.php';footer();?>

<script>
window.onload = () => {
    setTimeout(function () {
    $('.loading').style.display = 'none';
    $('body').style.overflow = 'auto';

    }, 1700)
    
    getAllitems()
}

</script>