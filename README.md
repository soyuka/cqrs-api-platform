# CQRS Api Platform

/!\ WIP /!\

Maybe that one day this could be a bundle...
Ideas from https://github.com/api-platform/core/issues/2729

## Notes

This is an attempt to add CQRS on top of Api Platform.

It's using the symfony messenger component with two buses:
- QueryBus
- CommandBus (todo)

And removing most of the api platform's listeners by transforming them in middlewares.

Event listeners in `api.xml` (api-platform/core dependency) should be changed:

```xml
        <service id="api_platform.listener.request.read" class="App\EventListener\ReadListener">
            <argument type="service" id="App\Query\QueryBusInterface" />
            <argument type="service" id="api_platform.serializer.context_builder" />
            <argument type="service" id="api_platform.identifier.converter" />

            <tag name="kernel.event_listener" event="kernel.request" method="onKernelRequest" priority="4" />
        </service>

        <!-- this is TBD -->
        <service id="api_platform.listener.view.write" class="App\EventListener\WriteListener">
            <argument type="service" id="api_platform.data_persister" />
            <argument type="service" id="api_platform.iri_converter" on-invalid="null" />
            <argument type="service" id="api_platform.metadata.resource.metadata_factory" on-invalid="null" />

            <tag name="kernel.event_listener" event="kernel.view" method="onKernelView" priority="32" />
        </service>
```

In `validator.xml ` for now:

```xml
        <service id="api_platform.listener.view.validate" class="App\EventListener\NoopListener">
            <argument type="service" id="api_platform.validator" />
            <argument type="service" id="api_platform.metadata.resource.metadata_factory" />

            <tag name="kernel.event_listener" event="kernel.view" method="onKernelView" priority="64" />
        </service>

        <service id="api_platform.listener.view.validate_query_parameters" class="App\EventListener\NoopListener" public="false">
            <argument type="service" id="api_platform.metadata.resource.metadata_factory" />
            <argument type="service" id="api_platform.filter_locator" />

            <tag name="kernel.event_listener" event="kernel.request" method="onKernelRequest" priority="16" />
        </service>
```

## Todo:

- add context for data providers in the query
- support write through commands
- transform validator listeners as middlewares
- Maybe even remove the Serialize/Deserialize Listeners?
- For graphql there could be a Query and a Mutation bus
- do a compiler pass to remove api platform listeners
- transform into a bundle
- share

