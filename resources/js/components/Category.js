import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import SubCategoryHome from './SubCategoryHome';
import AddToCartButton from './AddToCartButton';
import Loader from 'react-loader-spinner';

export const LoadingDemo = ()=> (
            <div
                style={{
                    width: "100%",
                    height: "100",
                    display: "flex",
                    justifyContent: "center",
                    alignItems: "center"
                }}
            >
                <Loader type="ThreeDots" color="#EC6E05"  height={100} width={100} />
            </div>
);

class Category extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            categories: [],
            loading: false
        };
    }

    componentDidMount() {
        this.setState({
            loading: true
        });
        axios.get('api/categories').then(response => {
            this.setState({
                loading: false,
                categories: response.data
            });
        });
    }

    render() {
        const {categories, loading} = this.state;
        return (
            loading ? (<LoadingDemo />) :
                    (categories.map(category => (
                    <div className="block-categories__item category-card category-card--layout--classic">
                        <div className="category-card__body">
                            <div className="category-card__image">
                                <a href={"product/" + category.Id}><img src={category.Image_URL__c} alt="" /></a>
                                <div className="category-card__name">
                                    <a href={"product/" + category.Id} style={{textTransform: 'capitalize'}}>{category.Name}</a>
                                </div>
                                <ul className="category-card__links">
                                    <SubCategoryHome categories={category} />
                                </ul>
                                <div className="category-card__all">
                                    <a href={"product/" + category.Id}>Show All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                        ))
                            )
                );
    }
}

if (document.getElementById('categoryDiv')) {
    ReactDOM.render(<Category />, document.getElementById('categoryDiv'));
}
