<div class="modal-body separator">
    <div class="row">
        <div class="col-lg-6 text-center">
            <span class="item" :class="transporterUnit | item('unit')"></span>
        </div>
        <div class="col-lg-6">
            <h5>
                @{{ transporterUnit.name }}
            </h5>
            <p>
                @{{ transporterUnit.description }}
            </p>
            <div class="attribute-row">
                <div class="col-lg-6">
                    <div class="attribute">
                        <h6>
                            {{ trans('messages.required_quantity') }}
                        </h6>
                        <h5>
                            @{{ transporterQuantity }} / @{{ unitQuantity(transporterUnit) }}
                        </h5>
                    </div>
                </div>
            </div>
            <ul v-if="!isMove" class="list-inline">
                <li v-if="planet.is_capital"
                    class="list-inline-item"
                    v-popover="{placement: 'top', trigger: 'hover', content: '{{ trans('validation.attributes.trade_time') }}'}">
                    <i class="far fa-clock"></i>
                    {{ trans('messages.instant') }}
                </li>
                <li v-else
                    class="list-inline-item"
                    v-popover="{placement: 'top', trigger: 'hover', content: '{{ trans('validation.attributes.trade_time') }}'}">
                    <i class="far fa-clock"></i>
                    @{{ travelTime | timer }}
                </li>
            </ul>
            <div class="attribute-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <button class="btn btn-success btn-block"
                                @click="transport()"
                                :disabled="!canTransport">
                            {{ trans('messages.movement.transport') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-body separator">
    <div class="item-input-row">
        <div class="col-md-4 col-lg-3" v-for="resource in planet.resources">
            <span class="item item-sm"
                  :class="resource | item('resource')"
                  v-popover="{placement: 'top', trigger: 'hover', title: resource.name, content: resource.description}">
                @{{ resource.name }}
            </span>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend" @click="setTotalResource(resource)">
                        <button class="btn btn-primary btn-block">
                            <i class="fas fa-clipboard-check"></i>
                        </button>
                    </div>
                    <input class="form-control"
                           type="number"
                           min="1"
                           :max="resourceQuantity(resource)"
                           :placeholder="resourceQuantity(resource) | bracket"
                           v-model.number="quantity[resource.id]">
                </div>
            </div>
        </div>
    </div>
</div>
