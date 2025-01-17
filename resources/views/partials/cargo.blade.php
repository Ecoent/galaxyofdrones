<cargo :is-enabled="isEnabled && isSelectedTab('cargo')"
       url="{{ route('api_mission') }}"
       store-url="{{ route('api_mission_store', '__mission__') }}" inline-template>
    <div v-if="isEnabled" class="cargo">
        <div class="cargo-summary modal-body separator text-center">
            <span v-for="resource in data.resources"
                  class="item item-sm"
                  :class="resource | item('resource')"
                  v-popover="{placement: 'top', trigger: 'hover', title: resource.name, content: resource.quantity}">
                @{{ resource.quantity | number }}
            </span>
            <span class="item item-sm solarion"
                  v-popover="{placement: 'top', trigger: 'hover', title: '{{ trans('messages.solarion.name') }}', content: data.solarion}">
                @{{ data.solarion | number }}
            </span>
        </div>
        <div v-if="isEmpty" class="modal-body separator">
            <p class="text-center">
                {{ trans('messages.mission.empty') }}
            </p>
        </div>
        <completion v-else v-for="mission in data.missions"
                    :key="mission.id"
                    :completion="mission"
                    :is-completable="isCompletable"
                    :store="store" inline-template>
            <div class="modal-body separator">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-left">
                        <span v-for="resource in completion.resources"
                              class="item item-sm"
                              :class="resource | item('resource')"
                              v-popover="{placement: 'top', trigger: 'hover', title: resource.name, content: resource.quantity}">
                            @{{ resource.quantity | number }}
                        </span>
                    </div>
                    <div class="col-lg-3 pt-lg-2 text-center">
                        <h5>
                            <i class="far fa-clock"></i>
                        </h5>
                        <h5>
                            @{{ remaining | timer }}
                        </h5>
                    </div>
                    <div class="col-lg-3 text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item" v-popover="{placement: 'top', trigger: 'hover', content: '{{ trans('validation.attributes.experience') }}'}">
                                <i class="fas fa-flask"></i>
                                @{{ completion.experience | number | sign(completion.experience) }}
                            </li>
                            <li class="list-inline-item highlight-warning"
                                v-popover="{placement: 'top', trigger: 'hover', content: '{{ trans('validation.attributes.energy') }}'}">
                                <i class="fas fa-bolt"></i>
                                @{{ completion.energy | number| sign(completion.energy) }}
                            </li>
                        </ul>
                        <button class="btn btn-success btn-block"
                                :disabled="!isCompletable(completion)"
                                @click="store(completion)">
                            {{ trans('messages.complete') }}
                        </button>
                    </div>
                </div>
            </div>
        </completion>
    </div>
</cargo>
