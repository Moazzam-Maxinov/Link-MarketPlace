import {
    BriefcaseBusiness,
    Check,
    Clock4,
    Filter,
    MoveRight,
    ThumbsUp,
} from "lucide-react";
import ReactDOM from "react-dom/client";
import { Input } from "../ui/input";
import { Button } from "../ui/button";
import PricingTab from "./PricingTab";

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
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-8 md:gap-20">
                    {/* Left Content */}
                    <div className="w-full md:w-[40%] space-y-4 md:space-y-10">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight w-full sm:max-w-xs">
                            <span className="text-primary text-2xl md:text-4xl">
                                What
                            </span>
                            <br /> You Get From Us
                        </h2>
                        <p className="text-primary-neutral text-lg sm:text-2xl opacity-75">
                            Delivering speed, simplicity, and unmatched reach,
                            we ensure every link works harder for your SEO
                            goals. With us, trust isn’t optional – it’s
                            guaranteed.
                        </p>
                        <button className="bg-primary hover:bg-primary-dark text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                            Learn More <MoveRight />
                        </button>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[60%] grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <Clock4 size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Links Published in 5 Days
                            </h3>
                            <p className="text-primary-neutral">
                                Quality takes time, but our links don't. Get
                                your content published within 5 days – quick and
                                reliable without cutting corners.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <Filter size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Easy Filtering
                            </h3>
                            <p className="text-primary-neutral">
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
                                50,000+ Websites
                            </h3>
                            <p className="text-primary-neutral">
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
                                Guaranteed Placement
                            </h3>
                            <p className="text-primary-neutral">
                                We don’t rely on guesswork – your placement is
                                guaranteed, no matter what happens. Our trusted
                                publishers make sure your link goes live.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Price Section */}
            <section className="bg-primary-BG3 py-12 md:py-20 space-y-16 md:space-y-20">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="text-center">
                        <h2 className="text-4xl md:text-6xl font-bold text-white">
                            Price of Our {""}
                            <span className="text-primary-light">
                                Backlinks
                            </span>
                        </h2>
                    </div>
                    <div className="mt-12 sm:mt-20 max-w-4xl mx-auto">
                        {/* Pricing Tab Component */}
                        <PricingTab />
                    </div>
                </div>
            </section>

            {/* Benefits Section */}
            <section className="py-10 md:py-16 bg-white">
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-8 md:gap-20">
                    {/* Left Content */}
                    <div className="w-full md:w-[40%] space-y-4 md:space-y-10">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight w-full sm:max-w-xs">
                            <span className="text-primary text-2xl md:text-4xl">
                                What
                            </span>
                            <br /> You Get Buying Backlinks
                        </h2>
                        <p className="text-primary-neutral text-lg sm:text-2xl opacity-75">
                            Get powerful backlinks that bring real results.
                            Improve your rankings, attract quality traffic, and
                            grow your business with services designed to
                            strengthen your online presence.
                        </p>
                        <button className="bg-primary hover:bg-primary-dark text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                            Start Building DA40+ Links Now
                        </button>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[60%] grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Natural Backlink Profile
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                Using our DA40+ links and proven SEO methods,
                                you can build a backlink profile that stands out
                                from the competition.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Heavy Traffic & Top Backlink Service
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                A well-planned and effective link-building
                                approach can drive over 30,000 monthly visitors
                                within just 3 to 6 months while increasing your
                                website’s authority.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Professional SEO Help
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                Our dedicated customer support team and in-house
                                SEO professionals for manual link-building
                                services are always ready to support your
                                outstanding link-building efforts.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Increased Sales
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                Once you’ve secured premium backlinks, use our
                                tips to gradually improve your website and
                                achieve exceptional sales and profit growth.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Higher Rankings
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                A carefully planned and executed outreach
                                link-building strategy can help your website
                                rank among the Top 10 on Google, Bing, Yahoo,
                                AOL, and hundreds of other search engines.
                                Secure dofollow backlinks that deliver real
                                results!
                            </p>
                        </div>
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
