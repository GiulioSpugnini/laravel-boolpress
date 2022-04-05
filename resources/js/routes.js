import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import HomePage from "./components/pages/HomePage";
import ContactPage from "./components/pages/ContactPage";
import NotFoundPage from "./components/pages/NotFoundPage";
const router = new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: HomePage },
        { path: "/contacts", component: ContactPage },
        { path: "*", component: NotFoundPage },
    ],
});

export default router;
