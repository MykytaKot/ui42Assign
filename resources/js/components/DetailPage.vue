<template>
    <div class="container ">
        <div class="align-center">
            <h1 class="fw-lighter">Detail Obce</h1>
        </div>
        <div class="container align-center">
            <div class="row shadow border-1 detail-margin w-100 rounded">
                <div class="col-12 d-flex d-md-none d-lg-none d-xl-none p-3">
                    <div class="col-3 detail-image" v-if="placeData.hasOwnProperty('img_path')">
                        <img :src="'/' + placeData.img_path" alt="">
                    </div>
                    <h1 class="text-primary col-9 align-center">{{ placeData.name }}</h1>
                </div>

                <div class="bg-light col-md-6 col-sm-12 padding-detail rounded-start">
                    <div class="container">
                        <div class="row">
                            <h6 class="col-6">Meno starostu:</h6>
                            <p class="col-6 text-start">{{ placeData.mayor_name }}</p>
                        </div>
                        <div class="row" v-if="placeData.boss != ''">
                            <h6 class="col-6">Meno prednostu:</h6>
                            <p class="col-6 text-start">{{ placeData.boss }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col-6">Samosprávny kraj:</h6>
                            <p class="col-6 text-start">{{ placeData.autonomous_region }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col-6">Okres:</h6>
                            <p class="col-6 text-start">{{ placeData.district }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col-6">Región:</h6>
                            <p class="col-6 text-start">{{ placeData.region }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col-6">Adresa obecného úradu:</h6>
                            <p class="col-6 text-start">{{ placeData.city_hall_address }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col-6">IČO:</h6>
                            <p class="col-6 text-start">{{ placeData.ico }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col-6">Počet obyvateľov:</h6>
                            <p class="col-6 text-start">{{ placeData.people }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col-6">Rozloha:</h6>
                            <p class="col-6 text-start">{{ placeData.area }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col-6">Prvá písomná zmienka:</h6>
                            <p class="col-6 text-start">{{ placeData.appeared_at }}</p>
                        </div>
                        <div class="row" v-if="placeData.phone != ''">
                            <h6 class="col-md-6 col-sm-3">Telefón:</h6>
                            <div class="row col-md-6 col-sm-9 ">
                                <div v-for="phone in placeData.phone.split(',') " class="w-100"><a
                                        class="col-12 text-start" :href="'tel:' + phone">{{ phone }}</a></div>


                            </div>
                        </div>
                        <div class="row" v-if="placeData.mobile_phone != ''">
                            <h6 class="col-md-6 col-sm-3">Mobil:</h6>
                            <div class="row col-md-6 col-sm-9">
                                <div v-for="mphone in placeData.mobile_phone.split(',') " class="w-100"><a
                                        class="col-12 text-start" :href="'tel:' + mphone">{{ mphone }}</a></div>


                            </div>
                        </div>
                        <div class="row" v-if="placeData.fax != ''">
                            <h6 class="col-md-6 col-sm-3">Fax:</h6>
                            <div class="row col-md-6 col-sm-9">
                                <div v-for="fax in placeData.fax.split(',') " class="w-100"><a class="col-12 text-start"
                                        :href="'tel:' + fax">{{ fax }}</a></div>


                            </div>
                        </div>
                        <div class="row" v-if="placeData.email != ''">
                            <h6 class="col-md-6 col-sm-3">Email:</h6>
                            <div class="row col-md-6 col-sm-9">
                                <div v-for="email in placeData.email.split(',') " class="w-100"><a
                                        class="col-12 text-start" :href="'mailto:' + email">{{ email }}</a></div>


                            </div>

                        </div>
                        <div class="row" v-if="placeData.website != ''">
                            <h6 class="col-md-6 col-sm-3">Web:</h6>
                            <div class="row col-md-6 col-sm-9">
                                <div v-for="web in placeData.website.split(',') " class="w-100"><a
                                        class="col-12 text-start" :href="web">{{ web }}</a></div>


                            </div>
                        </div>
                        <div class="row" v-if="placeData.latitude != '' && placeData.longitude != ''">
                            <h6 class="col-6">Zemepisné súradnice:</h6>
                            <p class="col-6 text-start">{{ placeData.latitude }}, {{ placeData.longitude }}</p>
                        </div>
                    </div>

                </div>
                <div class="bg-white col-md-6 col-sm-12 d-none d-md-flex d-lg-flex d-xl-flex  rounded-end row ">
                    <div class="col-12 detail-image " v-if="placeData.hasOwnProperty('img_path')">
                        <img :src="'/' + placeData.img_path" alt="">
                    </div>

                    <h1 class="text-primary col-12 text-center">{{ placeData.name }}</h1>
                </div>
            </div>
        </div>
        <div class="row px-2 " v-if="placeData.latitude != '' && placeData.longitude != ''">
        <div class="shadow p-3 col-md-6 col-sm-12 mb-4  rounded">
            <h4>{{ placeData.name }} na mape </h4>
            <div style="height:40vh;">
                <l-map ref="map" v-model:zoom="zoom" :center="[placeData.latitude, placeData.longitude]">

                    <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" layer-type="base"
                        name="OpenStreetMap">
                    </l-tile-layer>
                    <l-marker :lat-lng="[placeData.latitude, placeData.longitude]">
                        <l-popup>
                            {{ placeData.name }}
                        </l-popup>
                    </l-marker>
                </l-map>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import {
    LMap,
    LIcon,
    LTileLayer,
    LMarker,
    LControlLayers,
    LTooltip,
    LPopup,
    LPolyline,
    LPolygon,
    LRectangle,
} from "@vue-leaflet/vue-leaflet";
import "leaflet/dist/leaflet.css";
export default {
    components: {
        LMap,
        LTileLayer,
        LIcon,
        LPopup,
        LMarker
    },
    data() {
        return {
            zoom: 13,
            placeData: null,
            iconWidth: 25,
            iconHeight: 40,
        }
    },
    created() {
        this.axios
            .get(`/api/place/${this.$route.params.id}`)
            .then((res) => {
                this.placeData = res.data;
            });
    }
}

</script>