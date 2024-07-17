<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Top Brands</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
            </div>
        </div>
        <div id="TopBrandItem" class="row align-items-center">
        </div>
    </div>
</div>

<style>
    .categories_box {
        position: relative;
        width: 100%;
        height: 200px; /* Adjust height as needed */
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        padding: 4px;
        border: 1px solid #ddd;
    }

   
    .categories_box a {
        display: block;
        width: 100%;
        height: 100%;
        text-align: center;
    }

    .categories_box span {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }

</style>

<script>
    TopBrands();
    async function TopBrands(){
        let res = await axios.get("/BrandList");
        $("#TopBrandItem").empty();
        res.data['data'].forEach((item, i) => {
            let EachItem = `<div class="p-2 col-2">
                <div class="item">
                    <div class="categories_box">
                        <a href="/by-brand?id=${item['id']}">
                            <img src="{{ asset('storage') }}/${item['brandImg']}" alt="cat_img1"/>
                            <span>${item['brandName']}</span>
                        </a>
                    </div>
                </div>
            </div>`;
            $("#TopBrandItem").append(EachItem);
        });
    }
</script>
