<!-- Modal -->
<div class="modal fade" id="show-gallery" tabindex="-1" style="z-index: 100001 !important;" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">Show {{$typeGallery}}</h2>
            </div>
            <div class="modal-body">
                <div class="news-post image-post">
                    <div class="post-gallery">
                        @if($typeGallery == 'Image')
                            <img 
                                class="modal-gallery"
                            />
                        @elseif($typeGallery == 'Video')
                            <iframe class="modal-gallery" id="video" width="570" height="400" frameborder="0" allowFullScreen></iframe>
                        @endif
                    </div>
                </div>    
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->