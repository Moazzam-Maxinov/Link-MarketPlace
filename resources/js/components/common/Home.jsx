import {
    BadgeDollarSign,
    BriefcaseBusiness,
    CalendarCheck,
    ChartNoAxesColumn,
    CheckCircle,
    Clock4,
    Filter,
    Link2,
    MoveRight,
    Quote,
    ThumbsUp,
} from "lucide-react";
import ReactDOM from "react-dom/client";
import { Input } from "../ui/input";
import { Button } from "../ui/button";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "../ui/tabs";

const Home = () => {
    return (
        <>
            {/* hero section */}
            <section className="bg-gradient-to-b from-gray-100 to-primary-BG2 pt-8 md:pt-10 pb-20 space-y-16 md:space-y-20">
                {/* hero top section */}
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-12 md:gap-24">
                    {/* Left Content */}
                    <div className="w-full md:w-[40%]">
                        <h1 className="text-[2.75rem] md:text-[4rem] font-bold text-primary-dark leading-tight">
                            Buy Backlinks (DA30-60) From <br />
                            <span className="text-primary">$6.72/Per Link</span>
                        </h1>
                        <p className="text-primary-neutral text-lg sm:text-xl mt-4 opacity-90">
                            Build your site's authority with high-quality
                            backlinks from trusted niche sites. GetSEOLinks
                            delivers guest posts, link insertions, and SEO
                            content that drive results.
                        </p>
                        <div className="flex flex-col md:flex-row w-full items-start md:items-center mt-10 gap-3 md:gap-0">
                            <Input
                                type="email"
                                placeholder="Email"
                                className="py-7 px-6 rounded-l-xl rounded-r-xl md:rounded-r-none text-primary-neutral text-opacity-75"
                            />
                            <Button
                                type="submit"
                                className="text-white text-sm font-semibold py-7 px-10 rounded-r-xl rounded-l-xl md:rounded-l-none bg-primary hover:bg-primary-dark"
                            >
                                Sign Up Free
                            </Button>
                        </div>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[60%] flex items-center">
                        <img
                            src="./images/hero-image.svg"
                            alt=""
                            className=""
                        />
                    </div>
                </div>

                {/* hero stats section */}
                <div className="container mx-auto px-6 lg:px-10 grid grid-cols-1 md:grid-cols-5 gap-6">
                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            12+ Years
                        </h4>
                        <p className="text-white text-base">On The Market</p>
                    </div>

                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            9,00,000+
                        </h4>
                        <p className="text-white text-base">
                            Backlinks in Our Inventory
                        </p>
                    </div>

                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            5,000+
                        </h4>
                        <p className="text-white text-base">
                            Websites Promoted by GetSEOLinks
                        </p>
                    </div>

                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            2,200+
                        </h4>
                        <p className="text-white text-base">
                            Successful Customers
                        </p>
                    </div>

                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            3,50,200+
                        </h4>
                        <p className="text-white text-base">
                            Keywords in Top 10
                        </p>
                    </div>
                </div>
            </section>

            {/* Features Section */}
            <section className="py-10 md:py-16 bg-white">
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-8 md:gap-32">
                    {/* Left Content */}
                    <div className="w-full md:w-[45%] space-y-4 md:space-y-10">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight">
                            <span className="text-primary text-3xl md:text-5xl">
                                What
                            </span>
                            <br /> You Get From Us
                        </h2>
                        <p className="text-primary-neutral text-lg sm:text-2xl opacity-75">
                            Since 2016, our team has been building relationships
                            with webmasters in various niches and verticals.
                        </p>
                        <button className="bg-primary hover:bg-primary-dark text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                            Learn More <MoveRight />
                        </button>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[55%] grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <Clock4 size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Links published in 5 days
                            </h3>
                            <p className="text-primary-neutral opacity-75">
                                Quality takes time, but our links don't. Get
                                your content published within 5 days—quick and
                                reliable without cutting corners.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <Filter size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Easy filtering
                            </h3>
                            <p className="text-primary-neutral opacity-75">
                                With our filters, finding the right donor
                                websites becomes easier and more personalized.
                                You can organize them based on category,
                                location, keywords, and many other options to
                                match your needs.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <BriefcaseBusiness size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                50,000+ websites
                            </h3>
                            <p className="text-primary-neutral opacity-75">
                                Explore a wide range of options. Our website
                                features pages across various niches, providing
                                countless opportunities for placements.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <ThumbsUp size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Guaranteed placement
                            </h3>
                            <p className="text-primary-neutral opacity-75">
                                We don’t rely on guesswork – your placement is
                                guaranteed, no matter what happens. Our trusted
                                publishers make sure your link goes live.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Price Section */}
            <section className="bg-primary-BG2 pt-8 md:pt-10 pb-20 space-y-16 md:space-y-20">
                {/* hero top section */}
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <h2 className="text-3xl font-bold text-center text-gray-800 mb-6">
                        <span className="text-blue-500">Price</span> of our
                        backlinks
                    </h2>

                    {/* Tabs */}
                    <Tabs defaultValue="da80" className="space-y-6">
                        {/* Tabs List */}
                        <TabsList className="flex justify-center gap-2 rounded-lg bg-gray-100 p-2">
                            <TabsTrigger
                                value="da40"
                                className="px-4 py-2 rounded-md data-[state=active]:bg-white data-[state=active]:text-blue-600 data-[state=active]:shadow-lg transition"
                            >
                                DA 40
                            </TabsTrigger>
                            <TabsTrigger
                                value="da50"
                                className="px-4 py-2 rounded-md data-[state=active]:bg-white data-[state=active]:text-blue-600 data-[state=active]:shadow-lg transition"
                            >
                                DA 50
                            </TabsTrigger>
                            <TabsTrigger
                                value="da60"
                                className="px-4 py-2 rounded-md data-[state=active]:bg-white data-[state=active]:text-blue-600 data-[state=active]:shadow-lg transition"
                            >
                                DA 60
                            </TabsTrigger>
                            <TabsTrigger
                                value="da70"
                                className="px-4 py-2 rounded-md data-[state=active]:bg-white data-[state=active]:text-blue-600 data-[state=active]:shadow-lg transition"
                            >
                                DA 70
                            </TabsTrigger>
                            <TabsTrigger
                                value="da80"
                                className="px-4 py-2 rounded-md data-[state=active]:bg-white data-[state=active]:text-blue-600 data-[state=active]:shadow-lg transition"
                            >
                                DA 80
                            </TabsTrigger>
                        </TabsList>

                        {/* Tab Content */}
                        <TabsContent value="da80">
                            <div className="bg-white p-6 rounded-lg shadow-lg space-y-4">
                                {/* Price Details */}
                                <div className="flex items-center justify-between">
                                    <div className="text-gray-500 font-semibold">
                                        $220.29 one time
                                    </div>
                                    <div className="flex items-center text-green-600">
                                        <CheckCircle className="w-5 h-5 mr-2" />
                                        Index
                                    </div>
                                </div>
                                {/* Main Pricing */}
                                <div>
                                    <span className="text-gray-600">From</span>
                                    <h3 className="text-3xl font-bold text-green-600">
                                        $31.47
                                    </h3>
                                    <span className="text-gray-600">
                                        /Per month
                                    </span>
                                </div>
                                {/* Button */}
                                <div className="flex justify-center">
                                    <button className="bg-blue-600 text-white px-6 py-2 rounded-md font-medium shadow-md hover:bg-blue-700 transition">
                                        Get inside
                                    </button>
                                </div>
                                {/* Inventory Details */}
                                <div className="text-sm text-gray-600 space-y-1">
                                    <p>DA 80</p>
                                    <p>
                                        No. of DA80 pages: <strong>13</strong>
                                    </p>
                                </div>
                            </div>
                        </TabsContent>

                        {/* Additional tabs can be added similarly */}
                        <TabsContent value="da40">
                            <div className="bg-white p-6 rounded-lg shadow-lg">
                                <p className="text-gray-600">
                                    Content for DA 40 goes here.
                                </p>
                            </div>
                        </TabsContent>
                        <TabsContent value="da50">
                            <div className="bg-white p-6 rounded-lg shadow-lg">
                                <p className="text-gray-600">
                                    Content for DA 50 goes here.
                                </p>
                            </div>
                        </TabsContent>
                        <TabsContent value="da60">
                            <div className="bg-white p-6 rounded-lg shadow-lg">
                                <p className="text-gray-600">
                                    Content for DA 60 goes here.
                                </p>
                            </div>
                        </TabsContent>
                        <TabsContent value="da70">
                            <div className="bg-white p-6 rounded-lg shadow-lg">
                                <p className="text-gray-600">
                                    Content for DA 70 goes here.
                                </p>
                            </div>
                        </TabsContent>
                    </Tabs>
                </div>
            </section>

            {/* Plan Section */}
            <section
                className="relative bg-cover bg-center py-8 md:py-20 text-white"
                style={{ backgroundImage: 'url("./images/mountain-bg.jpg")' }}
            >
                {/* Overlay */}
                <div className="absolute inset-0 bg-black bg-opacity-20"></div>
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-20 md:gap-32 z-10 relative">
                    {/* Left Content */}
                    <div className="w-full md:w-[45%] space-y-10">
                        <h2 className="text-3xl sm:text-5xl font-semibold">
                            GetSEOLinks
                        </h2>
                        <p className="text-lg sm:text-xl text-white font-light opacity-75">
                            Fully custom link building campaigns delivered by
                            GetSEOLinks' experts
                        </p>
                        <a
                            href="#"
                            className="bg-white/10 hover:bg-white/20 text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                        >
                            Learn More <MoveRight />
                        </a>

                        <div className="items-start grid grid-cols-1 md:grid-cols-2 gap-y-8 mt-12 max-lg:!gap-y-12 gap-x-6 sm:gap-x-8 md:gap-x-16 max-lg:grid-cols-2">
                            <div className="space-y-8">
                                <span className="text-primary-light">
                                    <ChartNoAxesColumn size={32} />
                                </span>
                                <p className="text-white font-light text-base opacity-75">
                                    A fully comprehensive competitor link
                                    analysis required to rank.
                                </p>
                            </div>

                            <div className="space-y-8">
                                <span className="text-primary-light">
                                    <Link2 size={32} />
                                </span>
                                <p className="text-white font-light text-base opacity-75">
                                    An exact anchor text road map for your
                                    backlinks.
                                </p>
                            </div>

                            <div className="space-y-8">
                                <span className="text-primary-light">
                                    <BadgeDollarSign size={32} />
                                </span>
                                <p className="text-white font-light text-base opacity-75">
                                    Discounts on hand-selected links.
                                </p>
                            </div>

                            <div className="space-y-8">
                                <span className="text-primary-light">
                                    <CalendarCheck size={32} />
                                </span>
                                <p className="text-white font-light text-base opacity-75">
                                    Fully transparent month-to-month reporting.
                                </p>
                            </div>
                        </div>
                    </div>

                    {/* Right Side Graphics */}
                    <div className="w-full md:w-[55%]">
                        <img src="./images/hero_process.png" alt="" />
                    </div>
                </div>
            </section>

            {/* Testimonial Section */}
            <section className="py-16 bg-white">
                <div className="container mx-auto px-6 lg:px-10">
                    <div className="bg-[#d4f4a3] rounded-lg py-16 px-8">
                        <div className="flex items-center justify-center gap-5 max-w-3xl relative mx-auto">
                            <span className="text-primary-dark font-bold rotate-180 self-start">
                                <Quote size={50} />
                            </span>
                            <p className="text-primary-dark text-xl sm:text-3xl !leading-relaxed text-center">
                                GetSEOLinks is a{" "}
                                <span className="font-bold">
                                    perfect solution
                                </span>{" "}
                                for anyone needing to scale up their outreach.
                                These are quality guest posts on real sites that
                                I'm actually proud to show my clients.
                            </p>
                        </div>
                    </div>
                    <div className="mt-6 flex flex-col items-end gap-2">
                        <span className="text-xl font-bold leading-[1em] text-primary-dark">
                            Ryan Stewart
                        </span>
                        <span className="text-primary text-lg leading-[1em] font-medium">
                            Webris
                        </span>
                    </div>
                </div>
            </section>
        </>
    );
};

const rootElement = document.getElementById("main-body");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<Home />);
}

export default Home;
