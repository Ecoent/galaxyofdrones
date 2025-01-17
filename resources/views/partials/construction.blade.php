<construction url="{{ route('api_construction', '__grid__') }}"
              store-url="{{ route('api_construction_store', ['__grid__', '__building__']) }}"
              destroy-url="{{ route('api_construction_destroy', '__grid__') }}" inline-template>
    <div class="construction modal fade" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ trans('messages.construction.singular') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" v-if="data.buildings.length">
                        <div v-for="building in data.buildings" class="tab-pane" :class="{active: isSelected(building)}">
                            @include('partials.building')
                        </div>
                    </div>
                </div>
                <div class="modal-body separator">
                    <ul class="nav nav-pills">
                        <li class="nav-item" v-for="building in data.buildings">
                            <a class="nav-link"
                               :class="{active: isSelected(building)}"
                               href="#"
                               @click.prevent="select(building)">
                                <span class="item item-sm" :class="building | item('building')">
                                    @{{ building.name }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</construction>
