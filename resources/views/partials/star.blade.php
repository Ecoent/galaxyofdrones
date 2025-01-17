<star url="{{ route('api_star_show', '__star__') }}"
      bookmark-store-url="{{ route('api_bookmark_store', '__star__') }}" inline-template>
    <div class="star modal fade" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @{{ properties.name }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 text-center">
                            <span class="item star"></span>
                        </div>
                        <div class="col-lg-6">
                            <div class="attribute-row separator">
                                <div class="col-lg-6">
                                    <div class="attribute">
                                        <h6>
                                            {{ trans('messages.coordinate.x') }}
                                        </h6>
                                        <h5>
                                            @{{ geometry.coordinates[0] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="attribute">
                                        <h6>
                                            {{ trans('messages.coordinate.y') }}
                                        </h6>
                                        <h5>
                                            @{{ geometry.coordinates[1] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="attribute-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-block"
                                                type="button"
                                                @click="bookmark()"
                                                :disabled="data.is_bookmarked">
                                            {{ trans('messages.bookmark.star') }}
                                        </button>
                                    </div>
                                </div>
                                <div v-if="data.has_expedition" class="col-lg-6">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block"
                                                type="button"
                                                @click="showExpedition()">
                                            {{ trans('messages.expedition.star') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</star>
