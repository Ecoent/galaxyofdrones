<radar :is-enabled="isEnabled && isSelectedTab('radar')"
       url="{{ route('api_monitor_show') }}"
       :close="close" inline-template>
    <div v-if="isEnabled" class="radar">
        <div v-if="isEmpty" class="modal-body separator">
            <p class="text-center">
                {{ trans('messages.movement.empty') }}
            </p>
        </div>
        <movement v-else
                  v-for="movement in data.incoming_movements"
                  :key="movement.id"
                  :movement="movement"
                  :can-move="isRouteName('starmap')"
                  :move="move" inline-template>
            <div  class="modal-body separator">
                <div class="row">
                    <div class="col-lg-2 text-center text-lg-left">
                        <span class="item item-sm" :class="movement.end.resource_id | item('planet')">
                            @{{ movement.end.display_name }}
                        </span>
                    </div>
                    <div class="col-lg-5 pt-lg-2 text-center">
                        <h5 class="highlight-danger">
                            <i class="fas fa-arrow-left"></i>
                        </h5>
                        <h5>
                            @{{ remaining | timer }}
                        </h5>
                    </div>
                    <div class="col-lg-2 text-center">
                        <span class="item item-sm" :class="movement.start.resource_id | item('planet')">
                            @{{ movement.start.display_name }}
                        </span>
                    </div>
                    <div class="col-lg-3 pt-lg-3">
                        <button class="btn btn-primary btn-block"
                                :disabled="!canMove"
                                @click="move(movement)">
                            {{ trans('messages.move') }}
                        </button>
                    </div>
                </div>
            </div>
        </movement>
    </div>
</radar>
