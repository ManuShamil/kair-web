<?php
    $hospitals = Hospital::all();
?>

<div class="hospitals-section">
        <div class="hospitals-container ">
            <header>
                <h2 class="section-title">Browse our <span>Hospitals</span></h2>
                <p>More than <span>50+</span> Hospitals across India.</p>
            </header>
            <div class="row">

                <div class="column" v-for="(hospital,index) in randomizedHospitals.slice(0,4)" v-bind:key="index">
                    <article>
                        <figure class="overlay-effect">
                            <figure>
                                <router-link :to="`/hospitals/${hospital.hospitalUniqueName}`" :title="hospital[localization].hospitalName">
                                    <img width="585" height="500" v-bind:src="getPrimaryImage(hospital)" :style="{'background-image' : `url(${getPrimaryImage(hospital)})` }" class="attachment-doctor-grid-thumb size-doctor-grid-thumb wp-post-image" alt="">
                                </router-link>
                            </figure>
                            <router-link class="overlay" :to="`/hospitals/${hospital.hospitalUniqueName}`">
                                <i class="top"></i> 
                                <i class="bottom"></i>
                            </router-link>
                        </figure>
                        <div class="entry-content">
                            <h3 class="entry-title">
                                <router-link :to="`/hospitals/${hospital.hospitalUniqueName}`">{{hospital[localization].hospitalName}}</router-link>
                            </h3>
                            <div class="entry-info">
                                <router-link :to="`/hospitals/${hospital.hospitalUniqueName}`">{{hospital[localization].hospitalArea || "Unknown"}}</router-link>    
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <div class="button-wrapper">
                <router-link to="/hospitals" >View all Hospitals</router-link>
            </div>
        </div>
    </div>