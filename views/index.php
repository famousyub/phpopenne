
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.4/tailwind.min.css" />
<script  src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.7/vue.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>

<script src="https://cdn.jsdelivr.net/npm/portal-vue@2.1.7/dist/portal-vue.umd.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.3.3/umd/popper.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.1.3/vue-router.min.js" ></script>
<style>
.body-on {
  background-color: #dddddd;
}
.body-off {
  background-color: #000000;
}
.height-2 {
  min-height: 10em;
}
.btn {
  border-radius: 5em;
  height: 100px;
  width: 100px;
  outline: none;
  background: none 0;
  border: solid thin #444444;
  color: #eeeeee;
  font-size: 3em;
}
.btn-danger {
   background-color: maroon;
   color: #dddddd;
}
.btn-success {
  background-color: green;
  color: #000000;
}
.text-center {
   text-align: center;
}
* {
  margin: 0;
  padding: 0;
}

body {
  font: 15px/1.3 "Open Sans", sans-serif;
  color: #5e5b64;
  text-align: center;
}

a,
a:visited {
  outline: none;
  color: #389dc1;
}

a:hover {
  text-decoration: none;
}

section,
footer,
header,
aside,
nav {
  display: block;
}

/*-------------------------
		The menu
	--------------------------*/

nav {
  display: inline-block;
  margin: 60px auto 45px;
  background-color: #5597b4;
  box-shadow: 0 1px 1px #ccc;
  border-radius: 2px;
}

nav a {
  display: inline-block;
  padding: 18px 30px;
  color: #fff !important;
  font-weight: bold;
  font-size: 16px;
  text-decoration: none !important;
  line-height: 1;
  text-transform: uppercase;
  background-color: transparent;

  -webkit-transition: background-color 0.25s;
  -moz-transition: background-color 0.25s;
  transition: background-color 0.25s;
}

nav a:first-child {
  border-radius: 2px 0 0 2px;
}

nav a:last-child {
  border-radius: 0 2px 2px 0;
}

nav.home .home,
nav.projects .projects,
nav.services .services,
nav.contact .contact {
  background-color: #e35885;
}

p {
  font-size: 22px;
  font-weight: bold;
  color: #7d9098;
}

p b {
  color: #ffffff;
  display: inline-block;
  padding: 5px 10px;
  background-color: #c4d7e0;
  border-radius: 2px;
  text-transform: uppercase;
  font-size: 18px;
}
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

:root {
    --easeOutQuint: cubic-bezier(0.22, 1, 0.36, 1);
}

html,
body {
    height: 100%;
}

.icon {
    font-size: 20px;
}

.logo {
    font-size: 30px;
}

.avatar {
    height: 32px;
    width: 32px;
    border-radius: 50%;
    background-image: url("https://images.unsplash.com/photo-1584361853901-dd1904bb7987?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=60&h=60&q=80&crop=top");
    background-size: cover;
    background-position: center;
}

.nav-bar {
    width: 90px;
    display: flex;
    flex-direction: column;
    background: linear-gradient(to bottom, #4568dc, #b06ab3);

    .nav-bar-content {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex-grow: 1;
    }
}

.tool-bar {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    height: 68px;
    padding: 1rem;
    width: 100%;
    background: linear-gradient(to right, #4568dc, #49cbbf);
}

.tool-bar-append {
    display: flex;
    align-items: center;
}

.nav-block {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    height: 65px;
    user-select: none;
}

.nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: background-color 200ms var(--easeOutQuint);

    &:hover {
        background-color: rgba(white, 0.1);
    }

    &.nav-item-active {
        background-color: rgba(white, 0.2);
    }
}

.nav-tab {
    display: inline-flex;
    align-items: center;
    height: 100%;
    padding: 0 12px;
    font-weight: 500;
    color: white;
    transition: opacity 200ms var(--easeOutQuint);
    opacity: 0.7;

    &:hover {
        opacity: 0.85;
    }

    &.nav-tab-active {
        opacity: 1;
    }
}

.nav-indicator {
    position: absolute;
    top: 0;
    left: 0;
    background-color: white;
    transition-timing-function: var(--easeOutQuint);
    transition-duration: 350ms;
    transition-property: opacity, transform;

    &-vertical {
        width: 4px;
        height: 65px;
    }

    &-horizontal {
        top: auto;
        bottom: 0;
        height: 4px;
        width: 100px; // transform baseline
        transform-origin: left center;
    }
}

.popper {
    --popper-offset: 8px;

    &[data-popper-placement^="top"] {
        transform-origin: center bottom;
        .popper-arrow {
            bottom: -4px;
        }

        .popper-inner::before {
            bottom: calc(#{var(--popper-offset)} * -1);
            left: 0;
            height: var(--popper-offset);
            width: 100%;
        }
    }
    &[data-popper-placement^="bottom"] {
        transform-origin: center top;
        .popper-arrow {
            top: -4px;
        }

        .popper-inner::before {
            top: calc(#{var(--popper-offset)} * -1);
            left: 0;
            height: var(--popper-offset);
            width: 100%;
        }
    }
    &[data-popper-placement^="left"] {
        transform-origin: right center;
        .popper-arrow {
            right: -4px;
        }

        .popper-inner::before {
            top: 0;
            right: calc(#{var(--popper-offset)} * -1);
            height: 100%;
            width: var(--popper-offset);
        }
    }
    &[data-popper-placement^="right"] {
        transform-origin: left center;
        .popper-arrow {
            left: -4px;
        }

        .popper-inner::before {
            top: 0;
            left: calc(#{var(--popper-offset)} * -1);
            height: 100%;
            width: var(--popper-offset);
        }
    }
}

.popper-inner {
    display: flex;
    flex-direction: column;
    background: black;
    color: white;
    font-weight: 700;
    padding: 16px;
    font-size: 12px;
    border-radius: 8px;

    // prevent popper from closing when hovering between activator to content
    &::before {
        content: "";
        position: absolute;
    }
}

.popper-arrow {
    &,
    &::before {
        position: absolute;
        width: 8px;
        height: 8px;
        z-index: -1;
    }

    &::before {
        content: "";
        transform: rotate(45deg);
        background: black;
    }
}

.v-popper-enter-active,
.v-popper-leave-active {
    animation-timing-function: var(--easeInOutExpo);
    animation-fill-mode: forwards;

    .popper-inner {
        animation: inherit;
        transform-origin: inherit;
        animation-name: v-popper;
    }
}
.v-popper-enter-active {
    animation-duration: 200ms;
}
.v-popper-leave-active {
    animation-duration: 90ms;
    animation-direction: reverse;
}
@keyframes v-popper {
    0% {
        opacity: 0;
        transform: translate3d(-6px, 0, 0);
    }
    100% {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

.popper-item {
    padding: 8px 16px;
    margin: 0 -16px;
    transition: background-color 200ms var(--easeOutQuint);

    &:hover {
        background-color: rgba(white, 0.15);
    }

    &.popper-item-active {
        background-color: rgba(white, 0.3);
    }
}

.alert-badge {
    position: absolute;
    top: 13px;
    right: 25px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 18px;
    height: 18px;
    font-size: 12px;
    font-weight: 700;
    background-color: #df4b22;
    color: white;
    font-style: normal;
    border-radius: 6px;
}

</style>


</head>
     
     
<body class="text-center body"
     v-class="body-on: lights, body-off: !lights">
     
     
  <div id="app" class="flex flex-wrap h-screen">
    <nav-bar></nav-bar>
    <router-view></router-view>
    
    
    
   
</div>



<br/>

<br/>
 <button v-on="click: flipSwitch"
              v-class="btn-danger: lights, btn-success: !lights"
              class="btn">
        <span class="fa fa-power-off"></span>
     </button>
     
     
     
  <div id="main">
    <!-- The navigation menu will get the value of the "active" variable as a class. -->
    <!-- To stops the page from jumping when a link is clicked we use the "prevent" modifier (short for preventDefault). -->

    <nav v-bind:class="active" v-on:click.prevent>

      <!-- When a link in the menu is clicked, we call the makeActive method, defined in the JavaScript Vue instance. -->

      <input value="home" type="button" class="home" v-on:click="makeActive('home')" onblur="alert('cool')"></input>
      <a href="/" class="projects" v-on:click="makeActive('projects')">Projects</a>
      <a href="/about" class="services" v-on:click="makeActive('services')">Services</a>
      <a href="/" class="contact" v-on:click="makeActive('contact')">Contact</a>
    </nav>
    <!-- The mustache expression will be replaced with the value of "active".
 		 It will automatically update to reflect any changes. -->
    <p>You chose <b>{{active}}</b></p>
  </div>
     
     
     

     
     
     
     <script type="text/javascript">
     const { createPopper } = window.Popper;

const NavItem = {
    inheritAttrs: false,
    props: {
        meta: {
            type: Object,
            default: () => ({})
        },
        params: {
            type: Object,
            default: () => ({})
        },
        defaultClass: {
            type: String,
            default: "nav-item"
        },
        name: String,
        strictMatch: Boolean,
        preventDefault: Boolean
    },
    computed: {
        isActive() {
            const { name = "" } = this.$route;
            return this.strictMatch
                ? name === this.name
                : !!name.startsWith(this.name);
        },
        routeTo() {
            const { resolved } = this.$router.resolve({ name: this.name });
            return resolved.matched.length
                ? { name: this.name, params: this.params }
                : {};
        }
    },
    watch: {
        isActive: {
            immediate: true,
            handler(isActive) {
                if (isActive) {
                    this.$nextTick(() => this.$emit("change", this.$el));
                }
            }
        }
    },
    template: `
        <router-link
            :event="preventDefault ? '' : 'click'"
            :to="routeTo"
            v-on="$listeners"
            :class="[defaultClass, { [defaultClass + '-active']: isActive }]"
        >
            <slot />
        </router-link>
    `
};

const NavContainer = {
    props: {
        depth: {
            type: Number,
            default: 0,
            validator(value) {
                return [0, 1].includes(value);
            }
        }
    },

    data() {
        return {
            activeEl: null,
            indicator: {
                offsetY: 0,
                offsetX: 0,
                scaleX: 1
            }
        };
    },

    computed: {
        routes() {
            return this.$router.options.routes;
        },

        childRoutes() {
            if (!this.depth) return [];

            return (
                this.routes.find(
                    (route) => route.path === this.$route.matched[0].path
                )?.children || []
            );
        },

        computedRoutes() {
            const routes = this.depth ? this.childRoutes : this.routes;

            return routes
                .filter(({ meta = {} }) => !!meta.position && meta.navigable)
                .sort((a, b) => a.meta.position - b.meta.position);
        }
    },
    methods: {
        setIndicatorRef(el) {
            this.activeEl = el;
            this.updateIndicator();
        },
        updateIndicator() {
            if (!this.activeEl) return;
            // parent element must be relative or absolute
            const baseWidth = 100;
            this.indicator.offsetY = this.activeEl.offsetTop;
            this.indicator.offsetX = this.activeEl.offsetLeft;
            this.indicator.scaleX = this.activeEl.offsetWidth / baseWidth;
        }
    },
    mounted() {
        window.addEventListener("resize", this.updateIndicator);
    },
    beforeDestory() {
        window.removeEventListener("resize", this.updateIndicator);
    },
    render() {
        const { computedRoutes, indicator, setIndicatorRef } = this;
        return this.$scopedSlots.default({
            routes: computedRoutes,
            indicator,
            setIndicatorRef
        });
    }
};

const NavIndicator = {
    name: "NavIndicator",
    functional: true,
    props: {
        offsetX: {
            type: Number,
            default: 0
        },
        offsetY: {
            type: Number,
            default: 0
        },
        scaleX: {
            type: Number,
            default: 1
        },
        horizontal: Boolean,
        vertical: Boolean
    },
    render(h, { props, data }) {
        return h("div", {
            class: [
                "nav-indicator",
                { "nav-indicator-vertical": props.vertical },
                { "nav-indicator-horizontal": props.horizontal }
            ],
            style: {
                ...data.style,
                transform: `translate3d(${props.offsetX}px, ${props.offsetY}px, 0) scale3d(${props.scaleX}, 1, 1)`
            }
        });
    }
};

const defaultOptions = {
    placement: "right"
};
const defaultModifiers = [
    {
        name: "offset",
        options: {
            offset: [8, 8]
        }
    },
    {
        name: "preventOverflow",
        options: {
            padding: 16
        }
    }
];
const PopperContainer = {
    props: {
        options: {
            type: Object,
            default: () => ({})
        },
        modifiers: {
            type: Array,
            default: () => []
        },
        mouseEnterDelay: {
            type: Number,
            default: 100
        },
        mouseLeaveDelay: {
            type: Number,
            default: 300
        },
        hoverable: Boolean
    },
    data() {
        return {
            isActive: false,
            activatorRef: null,
            instance: null,
            timer: null
        };
    },
    computed: {
        computedOptions() {
            const computedModifiers = [
                ...defaultModifiers,
                {
                    name: "arrow",
                    options: {
                        element: this.$refs.arrow,
                        padding: 16
                    }
                },
                ...this.modifiers
            ];
            return {
                ...defaultOptions,
                onFirstUpdate: () => {
                    this.$emit("created");
                    this.$nextTick(this.updatePopper);
                },
                ...this.options,
                modifiers: computedModifiers
            };
        },
        listeners() {
            return (
                this.hoverable && {
                    mouseenter: this.onMouseEnter,
                    mouseleave: this.onMouseLeave
                }
            );
        }
    },
    watch: {
        isActive(isActive) {
            if (isActive) {
                this.$emit("show");
                this.updatePopper();
            } else {
                this.$emit("hide");
            }
        }
    },
    mounted() {
        document.addEventListener("click", this.handleClickaway);
    },
    beforeDestroy() {
        this.destroyPopper();
        document.removeEventListener("click", this.handleClickaway);
    },
    methods: {
        toggle({ target }) {
            if (!this.activatorRef) this.activatorRef = target;
            this.isActive = !this.isActive;
        },
        open({ target }) {
            if (!this.activatorRef) this.activatorRef = target;
            this.isActive = true;
        },
        close() {
            this.isActive = false;
        },
        createPopper() {
            this.$nextTick(() => {
                if (this.instance?.destroy) this.instance.destroy();

                this.instance = createPopper(
                    this.activatorRef,
                    this.$refs.popper,
                    this.computedOptions
                );
            });
        },
        updatePopper() {
            this.instance ? this.instance.forceUpdate() : this.createPopper();
        },
        destroyPopper() {
            if (!this.instance) return;

            this.instance.destroy();
            this.instance = null;
        },
        onMouseEnter(evt) {
            clearTimeout(this.timer);
            this.timer = setTimeout(() => {
                this.open(evt);
            }, this.mouseEnterDelay);
        },
        onMouseLeave(evt) {
            clearTimeout(this.timer);
            this.timer = setTimeout(() => {
                this.close(evt);
            }, this.mouseLeaveDelay);
        },
        handleClickaway({ target }) {
            if (this.$el.contains(target)) return;

            this.isActive = false;
        }
    },
    template: `
        <div class="popper-container" v-on="listeners">
            <transition name="v-popper" @after-leave="destroyPopper">
                <div ref="popper" v-show="isActive" class="popper">
                    <div class="popper-inner">
                        <slot name="content" v-bind="{ toggle, open, close }" />
                        <div ref="arrow" class="popper-arrow"></div>  
                    </div>
                </div>
            </transition>

            <slot name="activator" v-bind="{ toggle, open, close }" />
        </div>
    `
};

const NavBar = {
    components: {
        NavContainer,
        NavItem,
        NavIndicator,
        PopperContainer
    },
    template: `
        <div class="nav-bar">
            <div class="nav-block logo mt-4 mb-8 text-white fas fa-dragon"></div>

            <nav-container>
                <template v-slot="{ routes, indicator, setIndicatorRef }">
                    <div class="nav-bar-content">
                        <nav>
                            <nav-item 
                                v-for="item in routes" 
                                :key="item.name" 
                                class="nav-block" 
                                v-bind="item" 
                                @change="setIndicatorRef" 
                            >
                                <i v-if="item.meta.icon" :class="['icon fas text-white', item.meta.icon]"></i>
                                <i v-if="item.path === '/projects' && !$route.path.startsWith('/projects')" class="alert-badge">5</i>
                                <i v-else-if="item.path === '/assets' && !$route.path.startsWith('/assets')" class="alert-badge">1</i>
                            </nav-item>
                        </nav>

                        <popper-container hoverable class="mt-8 mb-4">
                            <template #content="{ close }">
                                <p class="text-lg mb-3 whitespace-no-wrap">Hello, Samuel</p>
                                <p class="py-2">Profile</p>
                                <nav-item 
                                    name="settings" 
                                    class="py-2"
                                    default-class="popper-item"
                                    @change="setIndicatorRef($refs.avatar.$el)"
                                    @click.native="close"
                                >
                                    Settings
                                </nav-item>
                                <p class="py-2">Help</p>
                                <p class="py-2">Log out</p>
                            </template>

                            <template #activator>
                                <nav-item 
                                    ref="avatar" 
                                    name="settings" 
                                    preventDefault
                                    class="nav-block" 
                                >
                                    <div class="avatar cursor-pointer"></div>
                                </nav-item>
                            </template>
                        </popper-container>

                        <nav-indicator vertical :offset-y="indicator.offsetY" />
                    </div>
                </template>
            </nav-container>

        </div>
    `
};

const ToolBar = {
    components: {
        NavContainer,
        NavIndicator,
        NavItem
    },
    template: `
        <nav-container :depth="1">
            <template v-slot="{ routes, indicator, setIndicatorRef }">
                <div class="tool-bar">
                    <template v-if="routes.length">
                        <nav>
                            <nav-item 
                                v-for="item in routes"
                                :key="'nav-tab-' + item.name"
                                v-bind="item"
                                default-class="nav-tab"
                                strictMatch
                                @change="setIndicatorRef" 
                            >
                                {{ item.meta.label }}
                            </nav-item>

                            <nav-indicator
                                horizontal 
                                :offset-x="indicator.offsetX" 
                                :scale-x="indicator.scaleX" 
                            />
                        </nav>

                    </template>

                    <div class="tool-bar-append"><slot name="append" /></div>
                </div>
            </template>
        </nav-container>
    `
};

const ToolBarLayout = {
    components: {
        ToolBar
    },
    template: `
        <div class="flex flex-col flex-grow">
            <tool-bar>
                <template #append>
                    <portal-target name="toolbar" />
                </template>
            </tool-bar>
            <router-view />
        </div>
`
};

const DemoPage = {
    methods: {
        showAlert() {
            alert("Using a portal to add dynamic content to ToolBar");
        }
    },
    template: `
        <div class="grid grid-cols-3 gap-4 p-4 flex-grow">
            <portal to="toolbar">
                <button 
                    type="button"
                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 rounded"
                    @click="showAlert"
                >
                    {{ $route.matched[0].meta.label }}
                </button>
            </portal>

            <div class="col-span-3 p-4 bg-gray-300">
                <div class="text-4xl">{{ $route.name }}</div>  
            </div>

            <div class="col-span-2 bg-gray-200"></div>
            <div class="col-span-1 bg-gray-300"></div>
            <div class="col-span-1 bg-gray-200"></div>
            <div class="col-span-2 bg-gray-100"></div>
        </div>
    `
};

new Vue({
    el: "#app",
    router: new VueRouter({
        routes: [
            {
                path: "*",
                redirect: { name: "chat" }
            },
            {
                path: "/chat",
                name: "chat",
                meta: {
                    icon: "fa-comment",
                    navigable: true,
                    position: 1,
                    label: "Chat"
                },
                component: DemoPage
            },
            {
                path: "/timer",
                name: "timer",
                meta: {
                    icon: "fa-stopwatch",
                    navigable: true,
                    position: 2,
                    label: "Timer"
                },
                component: DemoPage
            },
            {
                path: "/tasks",
                name: "tasks",
                meta: {
                    icon: "fa-tasks",
                    navigable: true,
                    position: 3,
                    label: "Tasks"
                },
                component: DemoPage
            },
            {
                path: "/team",
                name: "team",
                meta: {
                    icon: "fa-users",
                    navigable: true,
                    position: 4,
                    label: "Team"
                },
                component: DemoPage
            },
            {
                path: "/projects",
                name: "projects",
                component: ToolBarLayout,
                meta: {
                    icon: "fa-project-diagram",
                    navigable: true,
                    position: 5,
                    label: "Projects"
                },
                // redirect: { name: 'projects.list' }
                children: [
                    {
                        path: "",
                        // VueRouter might cry here about duplicate names when using a bundler like Webpack -
                        // I've solved it by using the commented code instead.
                        name: "projects",
                        // name: "projects.list",
                        meta: {
                            navigable: true,
                            position: 1,
                            label: "Projects"
                        },
                        component: DemoPage
                    },
                    {
                        path: "/projects/work",
                        name: "projects.work",
                        meta: { navigable: true, position: 2, label: "Work" },
                        component: DemoPage
                    },
                    {
                        path: "/projects/documents",
                        name: "projects.documents",
                        meta: {
                            navigable: true,
                            position: 3,
                            label: "Documents"
                        },
                        component: DemoPage
                    },
                    {
                        path: "/projects/gallery",
                        name: "projects.gallery",
                        meta: {
                            navigable: true,
                            position: 4,
                            label: "Gallery"
                        },
                        component: DemoPage
                    }
                ]
            },
            {
                path: "/assets",
                name: "assets",
                meta: {
                    icon: "fa-cubes",
                    navigable: true,
                    position: 6,
                    label: "Assets"
                },
                component: ToolBarLayout,
                children: [
                    {
                        path: "",
                        name: "assets",
                        meta: {
                            navigable: true,
                            position: 1,
                            label: "Assets"
                        },
                        component: DemoPage
                    },
                    {
                        path: "/assets/reports",
                        name: "assets.reports",
                        meta: {
                            navigable: true,
                            position: 2,
                            label: "Reports"
                        },
                        component: DemoPage
                    }
                ]
            },
            {
                path: "/settings",
                name: "settings",
                meta: {},
                component: DemoPage
            }
        ]
    }),
    components: {
        NavBar,
        ToolBar
    }
});
     
     </script>
     
     
     
     
      

  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.5/vue.min.js"></script>
     
     
     <script>
     
     new Vue({
  el: 'body',
  data: {
    lights: true
  },
  methods: {
    flipSwitch: function() {
      this.lights = !this.lights;
    }
  }
});
     </script>
     
     <script type="text/javascript">
     // Creating a new Vue instance and pass in an options object.
var demo = new Vue({
  // A DOM element to mount our view model.
  el: "#main",

  // Define properties and give them initial values.
  data: {
    active: "home"
  },

  // Functions we will be using.
  methods: {
    makeActive: function(item) {
      // When a model is changed, the view will be automatically updated.
      this.active = item;
    },
    onBlur() {
      alert('onblur');
    }
  },
  computed: {
 
  }
});
     
     </script>
</body>
</html>
