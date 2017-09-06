<template>
    <div class="container" >
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default" >
                        <div class="panel-heading">Upload</div>

                        <div class="panel-body" >

                            <input type="file" name="video" id="video" @change="fileInputChange" v-if="!uploading" >

                            <div id="video-form" v-if="uploading && !failed">
                                form

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</template>
<script>
    export default {
        data(){
            return{
                uploading: false,
                uploadComplete: false ,
                failed : false
            }
        },
        methods:{
            fileInputChange(){

                this.uploading = true;
                this.failed = false;

                //Store the metadata

                //Grap and upl0ad video
                //console.log('File Change');
            }
        },
        ready() {
            //
        }
    }
</script>
